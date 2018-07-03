<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocationPointsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('location_points', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('trip_id');
			$table->text('location', 65535);
			$table->smallInteger('travel_status');
			$table->unique(['trip_id','travel_status'], 'trip_id_travel_status');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('location_points');
	}

}
