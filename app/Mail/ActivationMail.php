<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ActivationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->view('emails.activation')
                    ->subject('Kode Aktivasi Akun KPPS Anda')
                    ->with([
                        'name' => $this->user->name,
                        'activationCode' => $this->user->activation_code,
                    ]);
    }
}
