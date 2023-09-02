<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PropertyManagerNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $plainPassword;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $plainPassword)
    {
        $this->user = $user;
        $this->plainPassword = $plainPassword;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.property_manager')
            ->subject('Welcome to A.Martínez Wrecker Service')
            ->with([
                'user' => $this->user,
                'plainPassword' => $this->plainPassword,
            ]);
    }
}
