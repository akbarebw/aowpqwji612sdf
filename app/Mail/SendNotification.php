<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $message;
    public $details;
    public $subjectEmail;
    /**
     * Create a new message instance.
     */
    public function __construct($details,$message,$subjectEmail)
    {
        $this->details=$details;
        $this->message=$message;
        $this->subjectEmail=$subjectEmail;
    }
    public function build()
    {
        return $this->subject($this->subjectEmail)
            ->view('notification.notification');
    }
}
