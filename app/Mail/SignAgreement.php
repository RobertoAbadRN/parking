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

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function build() {
        return $this->view('emails.sign-agreement')
            ->subject('Welcome to YourWebsite')
            ->attach(public_path(("pdfs") . "\\permiso.pdf"))
            ->with([
                'user' => $this->user,
            ]);
    }
}
