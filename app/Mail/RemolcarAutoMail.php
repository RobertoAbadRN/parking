<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RemolcarAutoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $licensePlate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($licensePlate)
    {
        $this->licensePlate = $licensePlate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.remolcar_auto')
            ->subject('Notice of Towing Vehicle')
            ->with([
                'licensePlate' => $this->licensePlate,
            ]);
    }
}