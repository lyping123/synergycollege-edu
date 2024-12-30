<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class sendappoiment extends Mailable
{
    use Queueable, SerializesModels;
    public $student;
    public $appoiment;
    /**
     * Create a new message instance.
     */
    public function __construct($appoiment,$student)
    {
        $this->appoiment=$appoiment;
        $this->student=$student;
    }

    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject('Update from Synergy College');
    }

    /**
     * Get the message envelope.
     */

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'appointment_noti',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
