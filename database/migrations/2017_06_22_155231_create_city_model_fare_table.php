<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCityModelFareTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('city_model_fare', function(Blueprint $table)
		{
			$table->integer('city_mid', true);
			$table->integer('model_id');
			$table->string('city_model_status', 10)->comment('A-Active,T-trash,D-Block');
			$table->integer('motor_mid');
			$table->integer('city_id');
			$table->float('base_fare', 10, 0)->comment('Service/Booking Charge');
			$table->float('min_km', 10, 0)->comment('Minimum charge KM');
			$table->float('min_fare', 10, 0)->comment('Minimum fare for below and equal to min_km');
			$table->float('cancellation_fare', 10, 0);
			$table->integer('below_above_km')->comment('Below & Above range KM. ');
			$table->float('below_km', 10, 0)->comment('Fare amount for distance is above the min km and below the range of below_above_km');
			$table->float('above_km', 10, 0)->comment('Fare amount for distance is above the range of below_above_km');
			$table->string('night_charge', 50);
			$table->time('night_timing_from');
			$table->time('night_timing_to');
			$table->float('night_fare', 10, 0);
			$table->string('waiting_time', 200);
			$table->float('minutes_fare', 10, 0)->comment('Fare per minutes');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('city_model_fare');
	}

}
