<?php

namespace App\Http\Controllers;

use App\Mail\SendOtpMail;
use App\Models\Students;
use Endroid\QrCode\QrCode;
use Illuminate\Support\Facades\File;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Spatie\Browsershot\Browsershot;

class StudentVerificationController extends Controller
{
    public $student;

    public function generateAndPrintPdf($id)
   
    {
        $this->student = Students::find($id);
        if ($this->student->freetokens < 1 && $this->student->paidtokens < 1) {
            return redirect()->back()->with('error', 'You have 0 tokens available. Kindly purchase tokens to generate.');
        }
    
        // Generate UUID and QR Code
        $this->student->unique_token = \Illuminate\Support\Str::uuid()->toString();
        $verificationUrl = route('student.verify', ['token' => $this->student->unique_token]);
    
        $qrCode = new QrCode($verificationUrl);
        $writer = new PngWriter();
        $result = $writer->write($qrCode);
    
        $qrPath = public_path('images/qr/' . $this->student->unique_token . '.png');
        $result->saveToFile($qrPath);
    
        // Save QR code info
        $this->student->verification_qr = 'images/qr/' . $this->student->unique_token . '.png';
        $this->student->qr_expire_at = now()->addHours(24);
    
        // Deduct token
        if ($this->student->freetokens > 0) {
            $this->student->freetokens -= 1;
        } else {
            $this->student->paidtokens -= 1;
        }
    
        // Save once
        $this->student->save();
    
        // Generate and save PDF
        $html = view('pdfs.profile', ['student' => $this->student])->render();
        $fileName = 'BUK-verify_' . str_replace(' ', '_', ucfirst($this->student->first_name) . '_' . ucfirst($this->student->last_name)) . '_' . now()->format('Ymd_His') . '.pdf';
        $pdfPath = storage_path('app/public/' . $fileName);
    
        Browsershot::html($html)
            ->setOption('no-sandbox', true)
            ->setOption('disable-setuid-sandbox', true)
            ->format('A4')
            ->save($pdfPath);
    
        return response()->download($pdfPath)->deleteFileAfterSend(true);
    }
    
    public function backToForm()
{
    session()->forget('student_verification');
    return redirect()->route('student.verify.form');
}
    public function showForm()
    {
        return view('studentverify');
    }

    public function sendOtp(Request $request)
{
    // Step 1: Validate input
    $request->validate([
        'matric_number' => 'required|string',
        'jamb_number' => 'required|string',
    ]);

    // Step 2: Look up student
    $student = Students::where('matriculation_number', $request->matric_number)
                        ->where('jamb_registration_number', $request->jamb_number)
                        ->first();
    $this->student=$student;

    if (!$student) {
        return redirect()->back()->with('error' , 'Student not found. Please check your details.');
    }

    // Step 3: Generate OTP and store in session
    $otp = rand(100000, 999999);
    session([
        'student_verification' => [
            'email' => $student->email,
            'otp' => $otp,
            'matric_number' => $student->matriculation_number,
            'jamb_number' => $student->jamb_registration_number,
        ]
    ]);

    // Step 4: Send OTP via email
    try {
        Mail::to($student->email)->send(new SendOtpMail($otp, $student));
    } catch (\Exception $e) {
        return redirect()->back()->with('error' , 'Failed to send OTP. Please try again later.');
    }

    // Step 5: Redirect back to show OTP input
    $maskedEmail = $this->maskEmail($student->email);
return redirect()->route('student.verify.form')->with('success', "OTP sent to {$maskedEmail}");
}

private function maskEmail($email)
{
    $parts = explode('@', $email);
    $name = $parts[0];
    $domain = $parts[1];

    $visibleChars = min(3, strlen($name));
    $masked = substr($name, 0, $visibleChars) . str_repeat('*', max(0, strlen($name) - $visibleChars));

    return $masked . '@' . $domain;
}


    public function verifyOtp(Request $request)
{
    // Validate OTP input
    $request->validate([
        'otp' => 'required|numeric',
    ]);

    // Get session data
    $session = session('student_verification');

    // If session is missing or OTP mismatched
    if (!$session || $request->otp != $session['otp']) {
        return redirect()->back()->with('error', 'Session expired or invalid OTP. Please start again.');
    }

    // Fetch student using saved session credentials
    $student = Students::where('jamb_registration_number', $session['jamb_number'])
                       ->first();

    if (!$student) {
        return redirect()->route('student.verify.form')->with('error', 'Student record not found. Please try again.');
    }

    // Clear session verification data

    // Log the student in (if using Laravel custom guard for students)
 
        // Login the student using Laravel's Auth guard
        Auth::guard('student')->login($student);
        // Check if the student was successfully logged in
        if (Auth::guard('student')->check()) {
            return redirect()->route('student.profile')->with('student_id', $student->id);
        }
   
}
}
