<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchOrderChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_order_children', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('search_order_id')->unsigned();
            $table->integer('age');
            $table->foreign('search_order_id')->references('id')->on('search_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('search_order_children');
    }
}
