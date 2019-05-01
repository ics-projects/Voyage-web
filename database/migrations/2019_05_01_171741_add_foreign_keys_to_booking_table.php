<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBookingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('booking', function(Blueprint $table)
		{
			$table->foreign('trip', 'fk_booking_trip')->references('id')->on('trip')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user', 'fk_booking_user')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('booking', function(Blueprint $table)
		{
			$table->dropForeign('fk_booking_trip');
			$table->dropForeign('fk_booking_user');
		});
	}

}
