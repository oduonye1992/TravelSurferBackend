<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialSearchOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_price_order', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('search_order_id')->unsigned();
            $table->integer('price');
            $table->boolean('flight_included');
            $table->boolean('baggage');
            $table->date('travel_start_date');
            $table->date('travel_end_date');
            $table->integer('boarding_type');
            $table->integer('room_type')->unsigned();
            $table->string('booking_url')->nullable();
            $table->integer('hotel_id')->unsigned();
            $table->integer('airport_id')->unsigned();

            $table->foreign('search_order_id')->references('id')->on('search_orders') ->onDelete('cascade');;
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
        Schema::dropIfExists('internet_price_order');
    }
}
