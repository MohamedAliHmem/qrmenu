<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $orderDetails;
    public $email;
    public $email2;

    /**
     * Create a new message instance.
     *
     * @param array $orderDetails
     * @param string $email
     * @param string|null $email2
     */
    public function __construct(array $orderDetails, string $email, string $email2 = null)
    {
        $this->orderDetails = $orderDetails;
        $this->email = $email;
        $this->email2 = $email2;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouvelle Commande!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.order_shipped',
            with: ['orderDetails' => $this->orderDetails],
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

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->to($this->email)
            ->subject('Nouvelle Commande!')
            ->view('emails.order_shipped')
            ->with(['orderDetails' => $this->orderDetails]);

        if ($this->email2) {
            $this->cc($this->email2);
        }

        return $this;

    }
}
