<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //use HasFactory;
    protected $table="producto";
    protected $primaryKey="ID_PRODUCTO";
    protected $fillable =[
        'NOM_PRODUCTO','VALOR_PRODUCTO','CATEGORA_PRODUCTO','CANT_PRODUCTO','ID_PROOVEDOR_FK_PRODUCTO'

      
    ];
    public $timestamps = false;

}
