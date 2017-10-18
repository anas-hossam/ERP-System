<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReqDesigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('req_designs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cusId')->unsigned()->default(0);
            $table->foreign('cusId')->references('id')->on('customers')->onDelete('cascade');
            $table->integer('tot_floor');
            $table->float('floors');
            $table->integer('capacity');
            $table->text('shape_roof');
            $table->integer('liv_room');
            $table->integer('din_room');
            $table->text('tot_br');
            $table->text('bedrooms');
            $table->integer('shar_bathr');
            $table->integer('kitch');
            $table->integer('balecony');
            $table->integer('study_r');
            $table->integer('laundry_r');
            $table->integer('servant_r');
            $table->integer('garage');
            $table->text('reqs');
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
        Schema::drop('req_designs');
    }
}
