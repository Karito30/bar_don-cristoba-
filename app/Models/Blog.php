<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $filable = ['FECHA_NA_EMPLEADO','NOM_EMPLEADO','NOMBRE_CARGO'];
}
