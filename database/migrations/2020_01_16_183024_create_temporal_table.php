<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('idarticulo')->nullable();
            $table->bigInteger('idusuario')->nullable();
            $table->string('nombre');
            $table->float('precio');
            $table->float('cantidad');
            $table->float('subtotal_pesos');
            $table->float('subtotal_dolares');
            $table->float('subtotal_gramos_oro');
            $table->bigInteger('idventa')->nullable();
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
        Schema::dropIfExists('temporal');
    }
}
