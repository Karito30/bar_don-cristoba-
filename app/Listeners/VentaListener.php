<?php

namespace App\Listeners;

use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use App\Notifications\Pedidos;

class VentaListener
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
        User::role(['Admin', 'Empleado'])
        ->whereNotIn('ID_RECIBO', $event->$venta->ID_RECIBO)
        ->each(function(User $user) use ($event){
            Notification::sed($user, new Ventas($event->$venta->ID_RECIBO));
        });
    }
}
