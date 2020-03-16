<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineofsaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lineofsale', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('idusuario');
            $table->bigInteger('idarticulo')->nullable();
            $table->bigInteger('idventa')->nullable();
            $table->integer('cantidad');
            $table->double('subtotal_pesos');
            $table->double('subtotal_dolares');
            $table->double('subtotal_gramos_oro');
            $table->foreign('idarticulo')->references('id')->on('article')->onDelete('cascade');
            $table->foreign('idventa')->references('id')->on('sale');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lineofsale');
    }
}
