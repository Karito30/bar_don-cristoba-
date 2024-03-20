<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
            Schema::create('pedido_proveedor', function (Blueprint $table) {
                $table->id('ID_PEDIDO_PROVEEDOR');
                $table->string('ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR');
                $table->string('NOMBRE_PRODUCTO_FK_PEDIDO_PROVEEDOR');
                $table->integer('CANTIDAD');
                $table->integer('PRECIO');
                $table->date('FECHA_PEDIDO');
                $table->decimal('SUBTOTAL');
                $table->decimal('TOTAL');
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_proveedor');
    }
};
