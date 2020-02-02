<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('idusuario');
            $table->double('total_pesos');
            $table->double('total_dolares');
            $table->double('total_gramos_oro');
            $table->foreign('idusuario')->references('id')->on('users');
        });
        /*
        Schema::table('sale', function (Blueprint $table) {           
            $table->foreign('idusuario')->references('id')->on('users');
        });
        */

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale');
    }
}
