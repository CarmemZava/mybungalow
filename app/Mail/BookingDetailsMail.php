<?php

namespace App\Mail;

use App\Models\Locacao;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingDetailsMail extends Mailable
{
    use Queueable, SerializesModels;

    //variável locacao passada pelo SendBookingMailController
    public $locacao;
    public $email;
    public $clientName;

    /**
     * Create a new message instance.
     */
    public function __construct(Locacao $locacao, string $email, string $clientName)
    {
        $this->locacao = $locacao;
        $this->email = $email;
        $this->clientName = $clientName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address'), config('mail.from.name')),
            replyTo: [new Address($this->email, $this->clientName),],
            subject: 'Booking Details MyBungalow',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'locacao.print',
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
