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
			$table->bigInteger('route_id')->unsigned();
			$table->bigInteger('stage_id')->unsigned()->index('stage_ID_idx');
			$table->integer('stages_order')->unsigned()->nullable();
			$table->primary(['route_id','stage_id']);
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
