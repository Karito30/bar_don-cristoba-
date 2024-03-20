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
        Schema::create('venta', function (Blueprint $table) {
            $table->id('ID_VENTA');
            $table->date('FECHA_VENTA');
            $table->decimal('VALOR_VENTA');
            $table->decimal('IVA_VENTA');
            $table->integer('CANT_VENTA');
            $table->integer('MESA')->nullable();
            $table->string('ID_ROL_FK_VENTA');
            $table->string('ID_PRODUCTO_FK_VENTA');
            $table->string('ID_METODO_PAGO_FK_VENTA');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta');
    }
};
