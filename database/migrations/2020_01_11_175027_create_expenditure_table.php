<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenditureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenditure', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('idtipogasto');
            $table->bigInteger('idusuario');
            $table->double('total');
            $table->foreign('idtipogasto')->references('id')->on('typeofexpenditure');
            $table->foreign('idusuario')->references('id')->on('users');
        });
        /*
        Schema::table('expenditure', function (Blueprint $table) {
            $table->foreign('idtipogasto')->references('id')->on('typeofexpenditure');
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
        Schema::dropIfExists('expenditure');
    }
}
