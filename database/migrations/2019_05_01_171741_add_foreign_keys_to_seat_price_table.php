<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSeatPriceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('seat_price', function(Blueprint $table)
		{
			$table->foreign('bus', 'fk_seat_price_bus')->references('id')->on('bus')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('trip', 'fk_seat_price_trip')->references('id')->on('trip')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('seat_price', function(Blueprint $table)
		{
			$table->dropForeign('fk_seat_price_bus');
			$table->dropForeign('fk_seat_price_trip');
		});
	}

}
