<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendOtpMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $otp;
    protected $student;
    /**
     * Create a new message instance.
     */
    public function __construct($otp, $student)
    {
        $this->otp=$otp;
        $this->student = $student;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('BUK-Verify OTP Code')
                    ->view('mail.send-otp')
                    ->with([
                        'otp' => $this->otp,
                        'student'=>$this->student,
                    ]);
    }
}