<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Pedido;

class Pedidos extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $venta;
    protected $pedido;
    public function __construct($pedido)
    {
        $this->pedido = $pedido;
       
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'mensaje' => '¡Nuevo pedido creado!',
            'pedido_id' => $this->pedido->ID_PEDIDO_PROVEEDOR,
        
            'icon' => 'fa-shopping-cart',
            'title' => 'Nuevo Pedido',

            'name' => optional(optional($this->pedido)->user)->name,
            'total' =>  $this->pedido->TOTAL,
        
        ];
       
        
    }
}
