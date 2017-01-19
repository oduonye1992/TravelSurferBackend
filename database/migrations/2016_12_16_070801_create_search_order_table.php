<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('hotel_id')->unsigned();
            $table->integer('airport_id')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('room_type')->unsigned();
            $table->boolean('boarding');
            $table->boolean('transport')->nullable();
            $table->integer('adults');
            $table->integer('children');
            // Meta Data
            $table->string('email')->nullable();
            $table->string('uuid');

            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->foreign('airport_id')->references('id')->on('airports');
            $table->foreign('room_type')->references('id')->on('hotels_room_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('search_orders');
    }
}
