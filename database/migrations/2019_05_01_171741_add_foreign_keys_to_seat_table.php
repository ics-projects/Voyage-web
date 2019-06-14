<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSeatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('seat', function(Blueprint $table)
		{
			$table->foreign('bus', 'fk_seat_bus')->references('id')->on('bus')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('seat_category', 'fk_seat_seat_category')->references('id')->on('seat_category')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('seat', function(Blueprint $table)
		{
			$table->dropForeign('fk_seat_bus');
			$table->dropForeign('fk_seat_seat_category');
		});
	}

}
