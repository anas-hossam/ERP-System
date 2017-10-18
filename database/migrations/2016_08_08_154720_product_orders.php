<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cusId')->unsigned()->default(0);
            $table->foreign('cusId')->references('id')->on('customers')->onDelete('cascade');
            $table->string('name');
            $table->string('company');
            $table->integer('mobile');
            $table->integer('tel');
            $table->integer('fax');
            $table->string('email')->unique();
            $table->string('website');
            $table->string('street');
            $table->string('city');
            $table->string('country');
            $table->text('reason');
            $table->text('res_build');
            $table->text('comm_build');
            $table->text('pub_build');
            $table->text('others');
            $table->string('budget');
            $table->text('des_draw');
            $table->string('beg_time');
            $table->text('team_need');
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
        Schema::drop('product_orders');
    }
}
