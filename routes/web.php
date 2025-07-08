<?php

use App\Http\Controllers\CallBackController;
use App\Http\Controllers\QrController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentVerificationController;
use App\Http\Middleware\OrganizationMiddleware;
use App\Http\Middleware\StaffMiddleware;
use App\Http\Middleware\StudentMiddleware;
use App\Livewire\StaffTable;
use App\Livewire\StudentProfile;
use App\Mail\TokenPurchaseSuccess;
use App\Models\Organization;
use App\Models\Staff;
use App\Models\Students;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Spatie\Browsershot\Browsershot;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::match(['GET', 'POST'], '/payment/callback', [CallBackController::class, 'handle'])->name('payment.callback');
    // Nabroll sends POST (or GET for test) with JSON payload

Route::get('/external/student', function () {
    return view('external');
})->name('external.student');

Route::get('/staff/logout', function () {
   FacadesAuth::guard('staff')->logout(); 
   return redirect('/')->with('success', 'Staff Logged out successfully.'); 
})->middleware(StaffMiddleware::class)->name('staff.logout');

Route::get('/student/logout', function () {
    FacadesAuth::guard('student')->logout(); 
    return redirect('/')->with('success', 'Student Logged out successfully.'); 
 })->middleware(StudentMiddleware::class)->name('student.logout');

 Route::get('/organization/logout', function () {
    FacadesAuth::guard('organization')->logout(); 
    return redirect('/')->with('success', 'Organization Logged out successfully.'); 
 })->middleware(OrganizationMiddleware::class)->name('organization.logout');

//Imports
Route::get('/import-organizations', function () {
    return view('import.import-organization');
})->name('organization.import');
Route::get('/import-students', function () {
    return view('import.import-student');
})->name('student.import');
Route::get('/import-staff', function () {
    return view('import.import-staff');
})->name('staff.import');


Route::get('/student-verify', function () {
    $staffId =FacadesAuth::guard('staff')->user()->id;
    if ($staffId) {
        $staff = Staff::where('id',$staffId)->first();
        $data['staff']=$staff;
        return view('staff-view',$data);
    }else   {
    
            return redirect()->route('home')->with('error', 'Staff not found.');
        }
    
    // Handle the case where the staff is not found (optional)

})->middleware(StaffMiddleware::class)->name('staff.view');

//StudentVerification

Route::middleware(['web'])->group(function () {
    Route::get('/student/download-pdf/{id}', [StudentVerificationController::class, 'generateAndPrintPdf'])
    ->name('student.download.pdf');
    Route::get('/student/verify', [StudentVerificationController::class, 'showForm'])->name('student.verify.form');
    Route::post('/student/verify/send-otp', [StudentVerificationController::class, 'sendOtp'])->name('student.verify.sendOtp');
    Route::post('/student/verify/otp', [StudentVerificationController::class, 'verifyOtp'])->name('student.verify.otp');
    Route::get('/student/verify/back', [StudentVerificationController::class, 'backToForm'])->name('student.verify.back');
});


    
Route::get('/student-profile' , function () {
    
    $studentId =FacadesAuth::guard('student')->user()->id;
    session(['student_id' => $studentId]);
     // Retrieve from session
    if ($studentId) {
        $student = Students::where('id',$studentId)->first();
        if ($student) {
            $data['student']=$student;
            return view('profile', $data);
        } else {
            return redirect()->route('home')->with('error', 'Student not found.');
        }
    } else {
        return redirect()->route('home')->with('error', 'No student ID in session.');
    }
})->middleware(StudentMiddleware::class)->name('student.profile');

//Organization View
Route::get('/organization-dashboard' , function () {
    
    $orgId = FacadesAuth::guard('organization')->user()->id;
     // Retrieve from session
    if ($orgId) {
        $organization = Organization::where('id',$orgId)->first();
        if ($organization) {
            $data['organization']=$organization;
            return view('organizationview', $data);
        } else {
            return redirect()->route('home')->with('error', 'Student not found.');
        }
    } else {
        return redirect()->route('home')->with('error', 'No student ID in session.');
    }
})->middleware(OrganizationMiddleware::class)->name('organization.view');

Route::get('/student/verify/{token}', function ($token) {
    $student = Students::where('unique_token', $token)->first();

    if ($student) {
        if (now()->greaterThan($student->qr_expire_at)) {
            return view('invalidqr', ['message' => 'expired']);
        }
        return view('pdfs.profile1', ['student' => $student]);
    } else {
        return view('invalidqr', ['message' => 'invalid']);
    }
})->name('student.verify');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});



// Verify QR code route



require __DIR__.'/auth.php';
