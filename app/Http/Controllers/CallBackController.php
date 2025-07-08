<?php

namespace App\Http\Controllers;

use App\Mail\TokenPurchaseSuccess;
use App\Models\Payments;
use App\Models\Staff;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CallBackController extends Controller
{
    public function handle(Request $request)
    {
        // Get payment status and transaction reference from request (GET or POST)
        $msg = $request->has('Msg') ? urldecode($request->get('Msg')) : null;
        $transactionRef = $request->get('TransactionRef');
        $message = 'Payment not successful.';
        $pricePerToken = 100;

        if (strtoupper($msg) === 'SUCCESSFUL' && $transactionRef) {
            $payment = Payments::where('transaction_ref', $transactionRef)->first();

            if ($payment) {
                $amount = $payment->amount;
                $tokens = intval($amount) / $pricePerToken;

                // Handle student payment
                if (isset($payment->student_id)) {
                    $student = Students::find($payment->student_id);
                    if ($student) {
                        $student->paidtokens += $tokens;
                        $student->save();
                        $success = true;
                        // Send success email
                        Mail::to($student->email)->send(new TokenPurchaseSuccess($payment));
                    } else {
                        $message = "Student not found for this payment.";
                    }
                    $payment->status = 'SUCCESSFUL';
                    $payment->paid_at = now();
                    $payment->save();
                    $message = "Payment successful. $tokens token(s) added to your account.";
                    return redirect()->route('student.profile')->with('PaymentMessage', $message);
                }

                // Handle staff payment
                if (isset($payment->staff_id)) {
                    $staff = Staff::find($payment->staff_id);
                    if ($staff) {
                        $staff->tokens += $tokens;
                        $staff->save();
                        $success = true;
                        // Send success email
                        Mail::to($staff->email)->send(new TokenPurchaseSuccess($payment));
                    } else {
                        $message = "Staff not found for this payment.";
                    }
                    $payment->status = 'SUCCESSFUL';
                    $payment->paid_at = now();
                    $payment->save();
                    $message = "Payment successful. $tokens token(s) added to your account.";
                    return redirect()->route('staff.view')->with('PaymentMessage', $message);
                }
          
       
}
        }
    }
}
