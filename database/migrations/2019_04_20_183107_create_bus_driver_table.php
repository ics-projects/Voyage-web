<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusDriverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_driver', function (Blueprint $table) {
            $table->bigIncrements('driver_no');
            $table->string('name');
            $table->string('license_no');
            $table->timestamps();

            // $table->primary('driver_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bus_driver');
    }
}
