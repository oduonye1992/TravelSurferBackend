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
            $table->integer('boarding_type')->unsigned();
            $table->integer('room_type')->unsigned();
            $table->string('booking_url')->nullable();

            $table->foreign('search_order_id')->references('id')->on('search_orders');
            $table->foreign('boarding_type')->references('id')->on('boarding_types');
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
