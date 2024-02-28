<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SuccessfulReservation extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $ticketDetails;
    /**
     * Create a new message instance.
     */
    public function __construct($user, $ticketDetails)
    {
        $this->user = $user;
        $this->ticketDetails = $ticketDetails;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->subject('Your Reservation Confirmation')
            ->to($this->user->email)
            ->view('emails.successful_reservation', $this->ticketDetails);
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
