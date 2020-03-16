<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('codigo_barras');
            $table->string('nombre');
            $table->integer('peso');
            $table->bigInteger('item_id')->nullable();
            $table->bigInteger('brand_id')->nullable();
            $table->bigInteger('material_id')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('provider_id')->nullable();
            $table->foreign('item_id')->references('id')->on('item');
            $table->foreign('brand_id')->references('id')->on('brand');
            $table->foreign('material_id')->references('id')->on('material');
            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('provider_id')->references('id')->on('provider');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}
