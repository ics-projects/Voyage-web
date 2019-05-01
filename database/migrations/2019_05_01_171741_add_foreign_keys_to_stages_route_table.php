<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStagesRouteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('stages_route', function(Blueprint $table)
		{
			$table->foreign('route', 'fk_stages_route_route')->references('id')->on('route')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('stage', 'fk_stages_route_stage')->references('id')->on('stage')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('stages_route', function(Blueprint $table)
		{
			$table->dropForeign('fk_stages_route_route');
			$table->dropForeign('fk_stages_route_stage');
		});
	}

}
