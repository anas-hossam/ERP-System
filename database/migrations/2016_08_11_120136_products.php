<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('catId')->unsigned()->default(0);
            $table->integer('supId')->unsigned()->default(0);
            $table->foreign('catId')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('supId')->references('id')->on('suppliers')->onDelete('cascade');
            $table->string('name');
            $table->string('category');
            $table->text('desc');
            $table->string('img');
            $table->string('unit');
            $table->string('cost_price');
            $table->string('buy_price');
            $table->string('parcode');
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
        Schema::drop('products');
    }
}
