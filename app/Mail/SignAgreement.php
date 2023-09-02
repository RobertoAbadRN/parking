<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SignAgreement extends Mailable {
    use Queueable, SerializesModels;
    public $user;
    public $englishLink;
    public $spanishLink;
    public $token;

    public function __construct($user, $englishLink, $spanishLink, $token) {
        $this->user = $user;
        $this->englishLink = $englishLink;
        $this->spanishLink = $spanishLink;
        $this->token = $token;
    }

    public function build()
    {
        return $this->view('emails.sign-agreement')
                    ->with([
                    'user' => $this->user,
                    'englishLink' => $this->englishLink,
                    'spanishLink' => $this->spanishLink,
                    'token' => $this->token,
                    ]);
    }
    
}

