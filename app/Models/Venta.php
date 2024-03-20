<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    //use HasFactory;
    protected $table="venta";
    protected $primaryKey="ID_VENTA";
    protected $fillable =[
        'FECHA_VENTA','VALOR_VENTA','IVA_VENTA','CANT_VENTA','MESA','ID_ROL_FK_VENTA','ID_PRODUCTO_FK_VENTA','ID_METODO_PAGO_FK_VENTA'
    ];

    public $timestamps = false;
}
