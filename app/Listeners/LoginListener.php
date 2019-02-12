<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Auth\Events\Login;
use App\Mail\NovoAcesso;
use Illuminate\Support\Facades\Mail;

class LoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
      //evento ativado no /Providers/EventServiceProvider
      info('Logou!');
      info($event->user->email);
      Mail::to($event->user)->send(new NovoAcesso($event->user));
    }
}
