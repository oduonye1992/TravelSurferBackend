<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSplashscreenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('splashscreen', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->longText('img')->nullable();
            $table->string('backgroundColor')->nullable();
            $table->string('title')->nullable();
            $table->string('fontColor')->nullable();
            $table->string('description')->nullable();
            $table->integer('level')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('splashscreen');
    }
}
