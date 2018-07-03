<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGeoModelFareTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('geo_model_fare', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('geo_fare_name', 25);
			$table->integer('veh_model_id');
			$table->integer('geo_location_id')->comment('Geo location taken from Geo API');
			$table->float('base_fare', 10, 0);
			$table->float('min_km', 10, 0)->comment('Minimum charge KM');
			$table->float('min_fare', 10, 0)->comment('below 1 km');
			$table->float('cancellation_fare', 10, 0);
			$table->float('below_above_km', 10, 0)->comment('Below & Above range KM.');
			$table->float('below_km', 10, 0)->comment('Below 10 Km with min fare');
			$table->float('above_km', 10, 0)->comment('Above 10 Km with min fare');
			$table->boolean('night_charge')->comment('1 - Yes,0 - No');
			$table->time('night_timing_from')->default('00:00:00');
			$table->time('night_timing_to')->default('00:00:00');
			$table->float('night_fare', 10, 0)->default(0)->comment('% of amount will be added total/km');
			$table->float('minutes_fare', 10, 0)->comment('Fare per minutes');
			$table->float('waiting_time', 10, 0)->comment('Taxi waiting charges');
			$table->boolean('status')->default(0)->comment('1- Active, 0 - Inactive');
			$table->timestamps();
			$table->unique(['veh_model_id','geo_location_id'], 'vehModelLocationId');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('geo_model_fare');
	}

}
