<?php

namespace App\Livewire;

use App\Mail\SendOtpMail;
use App\Models\Staff;
use App\Models\Students;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class StaffVerify extends Component
{
    public $staff_id;
    public $staff;
    public $student;
    public $otp;
    public $generatedOtp;
    public $successMessage1;
    public $errorMessage1;

    public function verifyStaffId()
    {
       
        // Validate staff ID
        $validatedData = $this->validate(
            [
                'staff_id' => 'required'
            ],
            [
                'staff_id.required' => 'Staff ID is required.',
            ]
        );

        if (!preg_match('/^BUK\/STAFF\/\d{6}$/', $this->staff_id)) {
            $this->errorMessage1 = 'Staff ID must follow the format BUK/STAFF/000918.';
            $this->successMessage1 = null;
            return;
        }
        

        // Fetch staff details
        $this->staff = Staff::where('staff_id', $this->staff_id)->first();

        if (!$this->staff) {
            $this->errorMessage1 = 'Staff ID not found.';
            $this->successMessage1 = null;
            return;
        }

        // Generate OTP and send mail
        $this->generatedOtp = rand(100000, 999999);
        try{
            Mail::to($this->staff->email)->send(new SendOtpMail($this->generatedOtp, $this->staff));
            
        }catch(\Exception $e){
            $this->errorMessage1 = 'OTP Sending Error, Check your internet connection'.$e->getMessage();
            $this->successMessage1=null;
            return ;
        } 
         $this->successMessage1 = 'OTP sent to your email, check and enter OTP below.';
         $this->errorMessage1 = null;
    return;
    }

    public function verifyOtp()
    {
        // Validate OTP
        $validatedData = $this->validate(
            [
                'otp' => 'required|numeric|digits:6'
            ],
            [
                'otp.required' => 'OTP is required.',
                'otp.numeric' => 'OTP must be a number.',
                'otp.digits' => 'OTP must be 6 digits long.',
            ]
        );

        if ($this->otp == $this->generatedOtp) {
            $this->successMessage1 = 'Staff ID verified successfully.';
            $this->errorMessage1 = null;
            FacadesAuth::guard('staff')->login($this->staff);
            return redirect()->route('staff.view', ['staff' => Staff::find($this->staff->id)]);    
        } else {
            $this->errorMessage1 = 'Invalid OTP. Please try again.';
            $this->successMessage1 = null;
        }
    }
    public function resendOtp()
    {
        // Generate new OTP and send mail
        $this->generatedOtp = rand(100000, 999999);
        try{
            Mail::to($this->staff->email)->send(new SendOtpMail($this->generatedOtp, $this->staff));
            
        }catch(\Exception $e){
            $this->errorMessage1 = 'OTP Sending Error, Check your internet connection';
            $this->successMessage1=null;
            return ;
        }
        
        $this->successMessage1 = 'New OTP sent to your email.';
        $this->errorMessage1 = null;
    }
   

    public function render()
    {
        return view('livewire.staff-verify');
    }
}