<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRouteStageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('route_stage', function(Blueprint $table)
		{
			$table->foreign('route', 'fk_route_stage_route')->references('id')->on('route')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('stage', 'fk_route_stage_stage')->references('id')->on('stage')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('route_stage', function(Blueprint $table)
		{
			$table->dropForeign('fk_route_stage_route');
			$table->dropForeign('fk_route_stage_stage');
		});
	}

}
