<?php

namespace App\Livewire;
use Illuminate\Support\Str;

use App\Models\Organization;
use App\Models\Students;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Carbon\Carbon;

class StudentVerify extends Component
{
    use WithFileUploads;

    public $institution_mode;
    public $message;
    public $showotp;
    public $step=1;
    public  $matric_number;
    public  $jamb_number;

    // Common Fields
    public $organization_name;

    // New Institution Fields
    public $email, $cac_number, $cac_certificate, $application_letter;

    // Existing Institution Fields
    public $certificate_number, $otp;
    public $successMessage;
    public $errorMessage;
    public $address;
    public $phone;
    public $generatedOtp;

    public function next()
    {
        $this->validate([
            'institution_mode' => 'required|in:new,existing',
        ],
            [
            'institution_mode.required' => 'Please select a mode of verification.',
        ]);

        $this->step = 2;
    }
    public function back()
    {
        $this->errorMessage   = null;
        $this->successMessage = null;
        $this->step = 1;
        $this->showotp = false;
    }

    public function maskedEmail($email)
    {
        // Split the email into local and domain parts
        list($local, $domain) = explode('@', $email);
    
        // Mask the middle part of the local part
        $maskedLocal = substr($local, 0, 3) . str_repeat('*', strlen($local) - 3);
    
        return $maskedLocal . '@' . $domain;
    }
    public function verifyExistingInstitution()

    {
        $this->errorMessage = null;
        $this->validate([
            'matric_number' => 'required|string|min:16|max:16',
            'jamb_number' => 'required|string'
        ]);
     
    
        $student = Students::where('matriculation_number', $this->matric_number)
            ->first();
            
        if (!$student ) {
            $this->errorMessage = 'No Student found with the details.';
            $this->successMessage = null;
            return;
        }else
        {
            $this->message = null;
            $this->generatedOtp = rand(100000, 999999);
            try{
                Mail::to($student->email)->send(new \App\Mail\SendOtpMail($this->generatedOtp, $student));
                $this->errorMessage = null;
                $maskedEmail=$this->maskedEmail($student->email);
                $this->successMessage = "Student Found, We have emailed you an OTP at $maskedEmail";
                $this->showotp = true;
            }catch(\Exception $e){
                $this->errorMessage = 'OTP Sending Error, Check your internet connection';
                $this->successMessage=null;
                $this->message=null;
                return ;
            }
            
           
        }
    }


public function verifyOtpAndProceed() 
{
    $this->validate([
        'otp' => 'required|numeric|digits:6'
    ],
    [
        'otp.required' => 'OTP is required.',
        'otp.numeric' => 'OTP must be a number.',
        'otp.digits' => 'OTP must be 6 digits long.',
    ]);

    if ($this->otp == $this->generatedOtp) {
        $this->successMessage = 'OTP verified successfully. You will now be redirected to start verifying BUK staff and students.';
        $this->errorMessage = null;
        
        $student = Students::where('matriculation_number', $this->matric_number)->first();
        Auth::guard('student')->login($student);
        if(Auth::guard('student')->check())
        {
          

            if (!$student->last_token_use || !Carbon::parse($student->last_token_use)->isSameDay(today())) {
                $student->freetokens = 1;
                $student->last_token_use = now();
                $student->save();
            }
            
        return redirect()->route('student.profile', )->with('student_id', $student->id); 
        }   
    } else {
        $this->errorMessage = 'Invalid OTP. Please try again.';
        $this->successMessage = null;
    }
}
public function resendsendOtp()
{
    // Generate new OTP and send mail
    $this->generatedOtp = rand(100000, 999999);
    $student = Students::where('matriculation_number', $this->matric_number)
    ->first();
    try{
        Mail::to($student->email)->send(new \App\Mail\SendOtpMail($this->generatedOtp, $student));
        $this->successMessage = 'New OTP sent to your email.';
        $this->errorMessage = null;
        $this->message=null;
        $this->showotp = true;
    }catch(\Exception $e){
        $this->errorMessage = 'OTP Re-Sending Error, Check your internet connection';
        $this->successMessage=null;
        $this->message=null;
        return ;
    }
   
}

    public function render()
    {
        return view('livewire.student-verify');
    }
}
