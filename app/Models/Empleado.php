<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    //use HasFactory
    protected $table="rol";
    protected $primaryKey="ID_ROL";
    protected $fillable =[
        'FECHA_NA_ROL',
        'NOMBRE',
        'NOMBRE_ROL'
    ];
    public $timestamps = false;
}
