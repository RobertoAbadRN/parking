<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User; // Asegúrate de usar el espacio de nombres correcto

class SuspendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $resident;

    public function __construct(User $resident)
    {
        $this->resident = $resident;
    }

    public function build()
    {
        return $this->subject('Your Resident Status Has Been Suspended')
                    ->view('emails.suspend_email');
    }
}




