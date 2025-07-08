<?php

namespace App\Livewire;

use App\Models\Students;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class SimpleVerification extends Component
{
    public $matriculationNumber;
    public $StaffId;
    public $errorMessage;
    public $message;
    public $successMessage;
    public  $student;

    public function verifyMatriculationNumber()
    {
        if (!preg_match('/^[A-Z]{3}\/\d{2}\/[A-Z]{3}\/\d{5}$/', $this->matriculationNumber)) {
            $this->errorMessage='The matriculation number format is invalid. It should match the format CST/20/COM/00539.';
            $this->message = '';
            $this->successMessage = '';
            return;
        }

        $this->student = Students::where('matriculation_number', $this->matriculationNumber)->first();
        if (!$this->student) {
            $this->message = 'No student found with this matriculation number.';
            $this->errorMessage = '';
            $this->successMessage = '';
            return;
        }
        else    
        {
            $this->successMessage = 'Student found: ' . $this->student->first_name . ' ' . $this->student->last_name . ' with matriculation number: ' . $this->student->matriculation_number. ' is currently an active student with BUK';
            $this->errorMessage='';
            $this->message = '';
         
        }
       
    }


    public function mount()
    {
        $this->matriculationNumber = '';
    }


    public function render()
    {
        return view('livewire.simple-verification');
    }
}
