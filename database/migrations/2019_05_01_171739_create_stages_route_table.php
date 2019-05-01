<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStagesRouteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stages_route', function(Blueprint $table)
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
		Schema::drop('stages_route');
	}

}
