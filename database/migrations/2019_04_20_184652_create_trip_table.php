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
            $table->bigIncrements('trip_no');
            $table->timestamp('departure_time');
            $table->unsignedBigInteger('bus_no');
            $table->unsignedBigInteger('route_no');
            $table->unsignedBigInteger('driver_no');
            $table->timestamps();

            $table->foreign('bus_no')->references('bus_no')->on('bus')->onDelete('cascade');
            $table->foreign('route_no')->references('route_no')->on('bus_route')->onDelete('cascade');
            $table->foreign('driver_no')->references('driver_no')->on('bus_driver')->onDelete('cascade');
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
