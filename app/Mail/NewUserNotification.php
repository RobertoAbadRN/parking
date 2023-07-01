<?php

namespace App\Mail;

use App\Models\User; // Importa la clase User del modelo de usuario
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUserNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $plainPassword;

    public function __construct(User $user, string $plainPassword)
    {
        $this->user = $user;
        $this->plainPassword = $plainPassword;
    }
    

    public function build()
    {
        return $this->view('emails.new_user_notification')
            ->subject('Welcome to YourWebsite')
            ->with([
                'user' => $this->user,
            ]);
    }
}
