<?php

namespace App\Livewire\Admin\Students;

use Livewire\Component;

class StudentList extends Component
{
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $date_of_birth;
    public $gender;
    public $address;
    public $city;
    public $state;
    public $country;
    public $matriculation_number;
    public $birth_certificate;
    public $waec_certificate;
    public $jamb_registration_number;
    public $jamb_score;
    public $admission_year;
    public $expected_year_of_graduation;
    public $picture;
    public $department;
    public $level;
    public $faculty;
    public $cgpa;
    public $hod_name;
    public $created_at;
    public $updated_at;
    public function render()
    {
        return view('livewire.admin.students.student-list');
    }
}
