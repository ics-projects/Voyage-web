<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('trip_no');
            $table->timestamp('departure_time');
            $table->unsignedBigInteger('bus_no');
            $table->unsignedBigInteger('route_no');
            $table->unsignedBigInteger('driver_no');
            $table->timestamps();

            $table->foreign('bus_no')->references('id')->on('bus');
            $table->foreign('route_no')->references('id')->on('bus_route');
            $table->foreign('driver_no')->references('id')->on('bus_driver');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trip');
    }
}
