<?php

namespace App\Models;

use App\Notifications\PedidoNotification as NotificationsPedidoNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\PedidoNotification;


class Pedido extends Model
{
    //use HasFactory;
    protected $table="PEDIDO_PROVEEDOR";
    protected $primaryKey="ID_PEDIDO_PROVEEDOR";
    protected $fillable =[
        'ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR','NOMBRE_PRODUCTO_FK_PEDIDO_PROVEEDOR','CANTIDAD_PEDIDO','PRECIO_PEDIDO','FECHA_PEDIDO','SUBTOTAL_PEDIDO','TOTAL'
       
    ];

    public $timestamps = false;
    
 

    
}
