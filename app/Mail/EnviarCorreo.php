<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnviarCorreo extends Mailable
{
    use Queueable, SerializesModels;

    public $correo;
    public $adjuntoPath;

    public function __construct($correo)
    {
        $this->correo = $correo;
        $this->adjuntoPath = $correo->adjunto ? storage_path('app/public/' . $correo->adjunto) : null;
    }
    
    public function build()
    {
        return $this->subject($this->correo->asunto)
                    ->html($this->correo->mensaje); // Esto asegura que el contenido se interprete como HTML
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->correo->asunto,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.correo', // Asegúrate de que esta vista existe
            with: ['mensaje' => $this->correo->mensaje]
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        $attachments = [];

        if ($this->adjuntoPath && file_exists($this->adjuntoPath)) {
            $attachments[] = Attachment::fromPath($this->adjuntoPath);
        }

        return $attachments;
    }
}
