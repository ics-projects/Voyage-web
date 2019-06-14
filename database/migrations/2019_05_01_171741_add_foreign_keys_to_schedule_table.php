<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToScheduleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('schedule', function(Blueprint $table)
		{
			$table->foreign('destination', 'fk_schedule_stage_destination')->references('id')->on('stage')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('origin', 'fk_schedule_stage_origin')->references('id')->on('stage')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('schedule', function(Blueprint $table)
		{
			$table->dropForeign('fk_schedule_stage_destination');
			$table->dropForeign('fk_schedule_stage_origin');
		});
	}

}
