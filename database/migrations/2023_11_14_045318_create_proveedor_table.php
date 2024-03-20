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
        Schema::create('proveedor', function (Blueprint $table) {
            $table->string('ID_PROVEEDOR', 40)->primary();
            $table->string('NOMBRE_PROVEEDOR', 50);
            $table->string('DIRECCION_PROVEEDOR', 50)->nullable();
            $table->bigInteger('TEL_PROVEEDOR');
            $table->string('ID_ROL_FK_PROVEEDOR', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedor');
    }
};
