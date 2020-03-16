<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->double('gramo_oro_nacional', 15, 8)->nullable()->default(1);
            $table->double('dolar', 15, 8)->nullable()->default(1);
            $table->double('gramo_plata', 15, 8)->nullable()->default(1);
            $table->double('gramo_oro_importado', 15, 8)->nullable()->default(1);
            $table->double('hechura', 15, 8)->nullable()->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config');
    }
}
