<?php

namespace App\Listeners;

use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use App\Notifications\Pedidos;

class PedidoListener
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
         User::role(['Admin', 'Proveedor'])
        ->whereNotIn('ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR', $event->$pedido->ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR)
        ->each(function(User $user) use ($event){
            Notification::sed($user, new Pedidos($event->$pedido->ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR));
        });

       

   
    }
}
