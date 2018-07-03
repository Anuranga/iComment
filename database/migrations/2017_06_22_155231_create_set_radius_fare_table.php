<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSetRadiusFareTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('set_radius_fare', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('trip_id');
            $table->integer('passenger_id')->index('set_radius_fare_passenger_id_idx');
			$table->integer('motor_model');
			$table->float('radius', 10, 0);
			$table->float('min_fare', 10, 0);
			$table->timestamp('created_date')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('set_radius_fare');
	}

}
