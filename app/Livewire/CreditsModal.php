<?php

namespace App\Livewire;

use App\Mail\TokenPurchaseInit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\Payments as PaymentModel;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class CreditsModal extends Component
{
    public $creditAmount;
    public $pricePerCredit = 100;
    public $totalPrice = 0;

    public function updatedCreditAmount()
    {
        $this->totalPrice = (int)$this->creditAmount * (int)$this->pricePerCredit;
    }

    public function purchaseCredits()
    {
        // Simulate storing or payment logic
        // Nabroll API integration for payment
        
        // Prepare payment details
        // Use a unique payer reference number for each transaction to avoid duplicates
        if(Auth::guard('student')->user())
        {
            $student = Auth::guard('student')->user();
            $payerRefNo = 'STU-' . $student->id . '-' . now()->format('YmdHis') . '-' . uniqid();
            $amount = (int)$this->creditAmount * (int)$this->pricePerCredit;
            $amountFormatted = number_format($amount, 2, '.', '');
            $publicApiKey = 'Pk_TeStHV9FnLZE1vSidgkH36b4s473lpKYkI58gYgc6M';
            $secretApiKey = 'Sk_teSTN-HY[n1]wIO32A-AU0XP5kRZ[tzHpOxQ6bf9]]';

            $payerName = Auth::guard('student')->user()->first_name . ' ' . Auth::guard('student')->user()->last_name ?? 'Unknown';
            $email = Auth::guard('student')->user()->email ?? 'test@example.com';
            $mobile = Auth::guard('student')->user()->phone ?? '08000000000';

            // Hash generation
            $hashString = $payerRefNo . $amountFormatted . $publicApiKey;
            $hash = hash_hmac('sha256', $hashString, $secretApiKey);
        // Create a payment record in the database before initiating payment
        $response = Http::asForm()->post('https://demo.nabroll.com.ng/api/v1/transactions/initiate', [
            "ApiKey"      => $publicApiKey,
            "Hash"        => $hash,
            "Amount"      => $amountFormatted,
            "PayerRefNo"  => $payerRefNo,
            "PayerName"   => $payerName,
            "Email"       => $email,
            "Mobile"      => $mobile,
            "Description" => "Token Purchase",
            "ResponseUrl" => route('payment.callback'),
            "MetaData " => "Student ID: $payerRefNo",
            "FeeBearer"   => "Customer",
        ]);
        if ($response->successful() && $response->json('status') === 'SUCCESSFUL') {
            $payment=PaymentModel::create([
                'student_id'   => $student->id,
                'payer_ref_no' => $payerRefNo,
                'payer_name'   => $payerName,
                'email'        => $email,
                'transaction_ref' => $response->json('TransactionRef'),
                'payment_url' => $response->json('PaymentUrl'),
                'mobile'       => $mobile,
                'amount'       => $amountFormatted,
                'status'       => 'INITIATED',
                'description'  => 'Token Purchase',
                'meta_data'    => json_encode([
                    'creditAmount' => $this->creditAmount,
                    'pricePerCredit' => $this->pricePerCredit,
                ]),
            ]);
            Mail::to($email)->send(new TokenPurchaseInit($payment));
            return redirect()->away($response->json('PaymentUrl'));
        } else {
            throw new \Exception('Payment initiation failed: ' . $response->json('msg', 'Unknown error'));
        }
        }
        elseif(Auth::guard('staff')->user())
        {
            $student = Auth::guard('staff')->user();
            $payerRefNo = 'STU-' . $student->id . '-' . now()->format('YmdHis') . '-' . uniqid();
            $amount = (int)$this->creditAmount * (int)$this->pricePerCredit;
            $amountFormatted = number_format($amount, 2, '.', '');
            $publicApiKey = 'Pk_TeStHV9FnLZE1vSidgkH36b4s473lpKYkI58gYgc6M';
            $secretApiKey = 'Sk_teSTN-HY[n1]wIO32A-AU0XP5kRZ[tzHpOxQ6bf9]]';

            $payerName = Auth::guard('staff')->user()->first_name . ' ' . Auth::guard('staff')->user()->last_name ?? 'Unknown';
            $email = Auth::guard('staff')->user()->email ?? 'test@example.com';
            $mobile = Auth::guard('staff')->user()->phone_number ?? '08000000000';

            // Hash generation
            $hashString = $payerRefNo . $amountFormatted . $publicApiKey;
            $hash = hash_hmac('sha256', $hashString, $secretApiKey);
        // Create a payment record in the database before initiating payment
        $response = Http::asForm()->post('https://demo.nabroll.com.ng/api/v1/transactions/initiate', [
            "ApiKey"      => $publicApiKey,
            "Hash"        => $hash,
            "Amount"      => $amountFormatted,
            "PayerRefNo"  => $payerRefNo,
            "PayerName"   => $payerName,
            "Email"       => $email,
            "Mobile"      => $mobile,
            "Description" => "Token Purchase",
            "ResponseUrl" => route('payment.callback'),
            "MetaData " => "Staff ID: $payerRefNo",
            "FeeBearer"   => "Customer",
        ]);
        if ($response->successful() && $response->json('status') === 'SUCCESSFUL') {
            $payment=PaymentModel::create([
                'staff_id'   => $student->id,
                'payer_ref_no' => $payerRefNo,
                'payer_name'   => $payerName,
                'email'        => $email,
                'transaction_ref' => $response->json('TransactionRef'),
                'payment_url' => $response->json('PaymentUrl'),
                'mobile'       => $mobile,
                'amount'       => $amountFormatted,
                'status'       => 'INITIATED',
                'description'  => 'Token Purchase',
                'meta_data'    => json_encode([
                    'creditAmount' => $this->creditAmount,
                    'pricePerCredit' => $this->pricePerCredit,
                ]),
            ]);
            Mail::to($email)->send(new TokenPurchaseInit($payment));
            return redirect()->away($response->json('PaymentUrl'));
        } else {
            throw new \Exception('Payment initiation failed: ' . $response->json('msg', 'Unknown error'));
        }
        }
       
    }

    public function render()
    {
        return view('livewire.credits-modal');
    }
}
