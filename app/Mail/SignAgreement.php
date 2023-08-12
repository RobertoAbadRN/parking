<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SignAgreement extends Mailable {
    use Queueable, SerializesModels;
    public $user;
    public $plainPassword;

    public function __construct($user, $link) {
        $this->user = $user;
        $this->link = $link;
    }

    public function build()
    {
        return $this->view('emails.sign-agreement')
                    ->with([
                        'user' => $this->user,
                        'link' => $this->link,
                    ]);
    }
    
}
