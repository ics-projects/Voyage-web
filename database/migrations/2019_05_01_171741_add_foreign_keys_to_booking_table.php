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
			$table->foreign('schedule', 'fk_booking_schedule')->references('id')->on('schedule')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('user', 'fk_booking_user')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('CASCADE');
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
			$table->dropForeign('fk_booking_schedule');
			$table->dropForeign('fk_booking_user');
		});
	}

}
