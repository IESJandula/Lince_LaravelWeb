<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FormularioEnviado extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $email;
    public $asunto;
    public $telefono;
    public $comentario;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datosFormulario)
    {
        $this->nombre = $datosFormulario['nombre'];
        $this->email = $datosFormulario['email'];
        $this->asunto = $datosFormulario['asunto'];
        $this->telefono = $datosFormulario['telefono'];
        $this->comentario = $datosFormulario['comentario'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nuevo formulario de contacto')
                    ->view('correo-electronico-contacto');
    }
}
