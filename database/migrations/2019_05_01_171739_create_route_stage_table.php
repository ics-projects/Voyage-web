<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRouteStageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('route_stage', function(Blueprint $table)
		{
			$table->bigInteger('route')->unsigned();
			$table->bigInteger('stage')->unsigned()->index('stage_ID_idx');
			$table->integer('stages_order')->unsigned();
			$table->primary(['route','stage']);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('route_stage');
	}

}
