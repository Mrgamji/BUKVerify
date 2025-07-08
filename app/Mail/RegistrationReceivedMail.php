<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegistrationReceivedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $organization;
    /**
     * Create a new message instance.
     */
    public function __construct($organization)
    {
        $this->organization=$organization;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('BUK-Verify Registration')
                    ->view('mail.registration')
                    ->with([
                        'organization'=>$this->organization,
                    ]);
    }
}
