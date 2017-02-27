<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternetPriceOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internet_price_order', function (Blueprint $table) {
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
<<<<<<< HEAD
            $table->string('hotel_id')->nullable();
            $table->string('airport_id')->nullable();
=======
            $table->integer('hotel_id')->unsigned();
            $table->integer('airport_id')->unsigned();
>>>>>>> bb934f22b25715dcc12315e022b01c022f0c8afb

            $table->foreign('search_order_id')->references('id')->on('search_orders') ->onDelete('cascade');;
            $table->foreign('room_type')->references('id')->on('hotels_room_type');
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->foreign('airport_id')->references('id')->on('airports');
<<<<<<< HEAD

=======
>>>>>>> bb934f22b25715dcc12315e022b01c022f0c8afb
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
