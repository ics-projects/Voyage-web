<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTripTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('trip', function(Blueprint $table)
		{
			$table->foreign('bus', 'fk_trip_bus')->references('id')->on('bus')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('route', 'fk_trip_route')->references('id')->on('route')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('schedule', 'fk_trip_schedule')->references('id')->on('schedule')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('trip', function(Blueprint $table)
		{
			$table->dropForeign('fk_trip_bus');
			$table->dropForeign('fk_trip_route');
			$table->dropForeign('fk_trip_schedule');
		});
	}

}
