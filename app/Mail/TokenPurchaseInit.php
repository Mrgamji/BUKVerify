<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TokenPurchaseInit extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
   

     * Create a new message instance.
     *
     * @param  \App\Models\Payments  $payment
     * @return void
     */
    protected $payment;
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
        return $this->subject('Token Purchase Initiated')
                    ->view('mail.tokenpurchaseinit')
                    ->with([
                        'payment' => $this->payment,
                    ]);
    }
}
