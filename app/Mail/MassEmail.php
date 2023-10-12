<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class MassEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $resident; // Agrega la propiedad $resident

    /**
     * Create a new message instance.
     *
     * @param $resident
     * @return void
     */
   
     public function __construct($resident, $view, $emailSetting)
     {
         $this->resident = $resident; // Asigna el valor del residente a la propiedad $resident
         $this->view = $view; // Agrega 'emails.' al nombre de la vista
         $this->emailSetting = $emailSetting; // Asigna la configuración de correo electrónico
     }
     

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view($this->view)->with([
            'resident' => $this->resident,
            'emailSetting' => $this->emailSetting, // Agregar la configuración de correo
        ]);
    }
    
    

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Mass Email',
        );
    }

  /**
 * Get the message content definition.
 *
 * @return \Illuminate\Mail\Mailables\Content
 */
public function content()
{
    return new Content(
        view: $this->view, // Utiliza la vista definida en la variable $view
    );
}


    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
