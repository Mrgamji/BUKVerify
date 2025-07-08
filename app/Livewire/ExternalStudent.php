<?php
namespace App\Livewire;

use App\Models\Student;
use App\Models\Students;
use Livewire\Component;
use Livewire\WithFileUploads;

class ExternalStudent extends Component
{
    use WithFileUploads;

    // Personal Info
    public $first_name, $last_name, $email, $phone, $date_of_birth, $gender;
    public $address, $city, $state, $country;

    // Academic Info
    public $matriculation_number, $jamb_registration_number, $jamb_score;
    public $admission_year, $expected_year_of_graduation, $department;
    public $level, $faculty, $cgpa, $hod_name;

    // Documents
    public $birth_certificate, $waec_certificate, $picture;

    public function submitStudentForm()
    {
        $validated = $this->validate([
            // Personal Info
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string|max:20',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:Male,Female',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',

            // Academic Info
            'matriculation_number' => 'required|string|max:50|unique:students,matriculation_number',
            'jamb_registration_number' => 'required|string|max:50',
            'jamb_score' => 'required|numeric|min:0|max:400',
            'admission_year' => 'nullable|integer|min:2000|max:2099',
            'expected_year_of_graduation' => 'nullable|integer|min:2000|max:2099',
            'department' => 'required|string|max:255',
            'level' => 'required|string|max:50',
            'faculty' => 'required|string|max:255',
            'cgpa' => 'required|numeric|min:0|max:5',
            'hod_name' => 'required|string|max:255',

            // Files
            'birth_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'waec_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // File uploads
        if ($this->birth_certificate) {
            $validated['birth_certificate'] = $this->birth_certificate->store('documents/birth_certificates', 'public');
        }

        if ($this->waec_certificate) {
            $validated['waec_certificate'] = $this->waec_certificate->store('documents/waec_certificates', 'public');
        }

        if ($this->picture) {
            $validated['picture'] = $this->picture->store('pictures/students', 'public');
        }

        Students::create($validated);

        session()->flash('success', 'Student registered successfully!');

        // Optionally clear form
        $this->reset();
    }

    public function render()
    {
        return view('livewire.external-student');
    }
}

