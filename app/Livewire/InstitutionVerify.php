<?php

namespace App\Livewire;

use App\Mail\RegistrationReceivedMail;
use Illuminate\Support\Str;


use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class InstitutionVerify extends Component
{
    use WithFileUploads;

    public $institution_mode;
    public $message;
    public $showotp;
    public $step=1;
    public  $organization_access_code;
    public $organization;

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
    public function submitNewInstitution()
    {
        $this->validate([
            'organization_name' => 'required|string',
            'email' => 'required|email',
            'cac_number' => 'required|string',
            'cac_certificate' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'application_letter' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'address' => 'required|string',
            'phone' => 'required|numeric',
        ]
    ,
[
            'organization_name.required' => 'Organization/Institution name is required.',
            'email.required' => 'Email is required.',
            'cac_number.required' => 'Certificate number for CAC/NUC/TUC etc number is required.',
            'cac_certificate.required' => 'CAC certificate is required.',
            'application_letter.required' => 'Duly signed Application letter on a letter-head is required.',
            'cac_certificate.mimes' => 'CAC certificate must be a file of type: pdf, jpg, png.',
            'application_letter.mimes' => 'Application letter must be a file of type: pdf, jpg, png.',
            'cac_certificate.max' => 'CAC certificate must not be greater than 2MB.',
            'application_letter.max' => 'Application letter must not be greater than 2MB.',
            'address.required' => 'Address is required.',
            'phone.required' => 'Phone number is required.',
            'phone.numeric' => 'Phone number must be numeric.',
]);

$orgNameSlug = Str::slug($this->organization_name); // Sanitize the name

$certificatePath = $this->cac_certificate->storeAs(
    'cac_certificates',
    $orgNameSlug . '_certificate.' . $this->cac_certificate->getClientOriginalExtension(),
    'public'
);

$letterPath = $this->application_letter->storeAs(
    'application_letters',
    $orgNameSlug . '_application_letter.' . $this->application_letter->getClientOriginalExtension(),
    'public'
);

$org = Organization::create([
    'name' => $this->organization_name,
    'email' => $this->email,
    'certificate_number' => $this->cac_number,
    'certificate_picture' => $certificatePath,
    'application_letter_picture' => $letterPath,
    'status' => 'pending',
    'address' => $this->address,
    'phone' => $this->phone,
    'organization_access_code' => strtoupper(Str::random(10)),
]);


       
       
        try
        {
            Mail::to($org->email)->send(new \App\Mail\RegistrationReceivedMail($org));
            $this->successMessage  = 'Registration submitted successfully. Please wait for verification.We have sent the next steps to your email.';
            $this->errorMessage = null;
        }
        catch(\Exception $e)
        {
            $this->successMessage  = null;
            $this->errorMessage = 'Registration Failed, try again later';
            $org->delete();
        }
        $this->reset( [
            'organization_name',
            'email',
            'cac_number',
            'cac_certificate',
            'application_letter',
            'address',
            'phone',
        ]);
    }

    public function verifyExistingInstitution()

    {
        $this->errorMessage = null;
        $this->validate([
            'organization_access_code' => 'required|string|min:10|max:10',
        ]);
     
    
        $this->organization = Organization::where('organization_access_code', $this->organization_access_code)
            ->first();
            
        if (!$this->organization ) {
            $this->errorMessage = 'No institution found with the provided access code.';
            $this->successMessage = null;
            return;
        }else
        {
            if($this->organization->status == 'pending')
            {
                $this->message = 'This institution still under verification, Kindly wait until you receive a confirmation mail.';
                $this->successMessage = null;
                $this->errorMessage = null;
                return;
            }
            if($this->organization->status == 'rejected')
            {
                $this->errorMessage = 'This institution has been rejected by the BUK-Verify. If you think this is wrong, Kindly contact support@bukverify.buk.edu.ng';
                $this->successMessage = null;
                $this->message = null;
                return;
            }
            
            $this->message = null;
            $this->generatedOtp = rand(100000, 999999);
            try{
                Mail::to($this->organization->email)->send(new \App\Mail\SendOtpMail($this->generatedOtp, $this->organization));
                $this->errorMessage = null;
                $this->successMessage = 'Institution found. Please check your email for the OTP.';
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
        Auth::guard('organization')->login($this->organization);
        return redirect()->route('organization.view')->with('organization_id', $this->organization->id);    
    } else {
        $this->errorMessage = 'Invalid OTP. Please try again.';
        $this->successMessage = null;
    }
}
public function resendsendOtp()
{
    // Generate new OTP and send mail
    $this->generatedOtp = rand(100000, 999999);
    try{
        Mail::to($this->organization->email)->send(new \App\Mail\SendOtpMail($this->generatedOtp, $this->organization));
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
        return view('livewire.institution-verify');
    }
}
