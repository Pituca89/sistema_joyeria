<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('articulo_id')->nullable();
            $table->double('valor_compra')->nullable();
            $table->double('valor_venta')->nullable();
            $table->double('valor_dolar')->nullable();
            $table->double('valor_oro')->nullable();
            $table->foreign('articulo_id')->references('id')->on('article')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price');
    }
}
