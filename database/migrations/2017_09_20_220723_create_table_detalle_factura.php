<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDetalleFactura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_factura', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_factura')->unsigned();
            $table->foreign('id_factura')->references('id')->on('facturas');
            $table->integer('id_libros')->unsigned();
            $table->foreign('id_libros')->references('id')->on('libros');
            $table->string('detalle_factura_cantidad');
            $table->float('detalle_factura_precio_unitario',8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_factura');
    }
}
