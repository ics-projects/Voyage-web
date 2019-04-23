<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripPassengerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_passenger', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('seat_no');
            $table->unsignedBigInteger('user_no');
            $table->unsignedBigInteger('trip_no');
            $table->unsignedBigInteger('stage_no');
            $table->timestamps();

            $table->foreign('user_no')->references('id')->on('users');
            $table->foreign('trip_no')->references('trip_no')->on('trip');
            $table->foreign('stage_no')->references('stage_no')->on('stage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trip_passenger');
    }
}
