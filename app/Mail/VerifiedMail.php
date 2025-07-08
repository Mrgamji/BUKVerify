<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerifiedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
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
                    ->view('mail.verified')
                    ->with([
                        'organization'=>$this->organization,
                    ]);
    }
}
