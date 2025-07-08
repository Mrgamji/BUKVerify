<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TokenPurchaseSuccess extends Mailable
{
    use Queueable, SerializesModels;

    /**
    /**
     * The payment instance.
     *
     * @var \App\Models\Payments
     */
    protected $payment;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Payments  $payment
     * @return void
     */
    public function __construct($payment)
    {
        $this->payment = $payment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Token Purchase Successful')
                    ->view('mail.tokenpurchasesuccess')
                    ->with([
                        'payment' => $this->payment,
                    ]);
    }
}
