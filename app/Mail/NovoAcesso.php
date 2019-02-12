<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class NovoAcesso extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     protected $user;

    public function __construct(User $user)
    {
        //construindo o email que deseja enviar.
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.novoacesso')->with([
          'nome' => $this->user->name,
          'email' => $this->user->email,
          'datahora' => now()->setTimezone('America/Sao_Paulo')->format('d-m-Y H:i:s')
        ]);
    }
}
