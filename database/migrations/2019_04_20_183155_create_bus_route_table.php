<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusRouteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_route', function (Blueprint $table) {
            $table->bigIncrements('route_no');
            $table->string('start');
            $table->string('destination');
            $table->timestamps();

            // $table->primary('route_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bus_route');
    }
}
