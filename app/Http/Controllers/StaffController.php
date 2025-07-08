<?php

namespace App\Http\Controllers;

use App\Mail\SendOtpMail;
use App\Models\Staff;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StaffController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'staff_id' => 'required|string'
            ]);
    
            $staff = Staff::where('staff_id', $request->staff_id)->first();
    
            if (!$staff) {
                return response()->json(['message' => 'Staff not found'], 404);
            }
            $otp    = rand(100000, 999999);  // Generate OTP
            $staff->otp = $otp;
            $staff->save();
            // Send OTP to the staff member's email or phone
            try {
                // Assuming you have a method to send OTP
                Mail::to($staff->email)->send(new SendOtpMail($otp,$staff));
            } catch (\Exception $e) {
                return response()->json(['message' => 'Failed to send OTP'], 500);
            }
            return response()->json([
                'message' => 'Staff found, Check Your Email for OTP',
            ]);
        } catch (\Exception $e) {
            return  response()->json([
                'message' => 'An error occurred during login',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    public function verify(Request $request)
    {
        try {
            $request->validate([
                'std_token'=>'required'
            ]);
    
            $student = Students::where('unique_token', $request->std_token)->first();
    
            if ($student) {
                return response()->json(['student' => $student]);
            } else {
                return response()->json(['message' => 'Invalid QR code'], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred during QR code verification',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    public function verifyOtp(Request $request)
    {
        try{
            
            $request->validate([
            'otp' => 'required',
            'staff_id' => 'required|string'
        ]);
        $staff = Staff::where('staff_id', $request->staff_id)->first();
        if  (!$staff) {
            return response()->json(['message' => 'Staff not found'], 404);
        }
        if ($staff->otp !== $request->otp) {
            return response()->json(['message' => 'Invalid OTP'], 401);
        }
        // OTP is valid, proceed with login
        return response()->json([
            'message' => 'OTP verified successfully',
            'staff' => $staff
        ]);
    }
        catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred during OTP verification',
                'error' => $e->getMessage()
            ], 500);
        }
    }
        
}
