<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyModelFareTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_model_fare', function(Blueprint $table)
		{
			$table->integer('company_model_fare_id', true);
			$table->integer('company_cid');
			$table->integer('model_id');
			$table->string('model_name', 250);
			$table->integer('motor_mid');
			$table->float('base_fare', 10, 0)->comment('Service/Booking Charge');
			$table->float('min_km', 10, 0)->comment('Minimum charge KM');
			$table->float('min_fare', 10, 0)->comment('below 1 km');
			$table->float('cancellation_fare', 10, 0);
			$table->float('below_above_km', 10, 0)->comment('Below & Above range KM. ');
			$table->float('below_km', 10, 0)->comment('Below 10 Km with min fare');
			$table->float('above_km', 10, 0)->comment('Above 10 Km with min fare');
			$table->string('night_charge', 50)->comment('1 - Yes,0 - No');
			$table->time('night_timing_from');
			$table->time('night_timing_to');
			$table->float('night_fare', 10, 0)->comment('% of amount will be added total/km');
			$table->string('fare_status', 3)->default('A')->comment('A- Active D - Deactive');
			$table->float('waiting_time', 10, 0);
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
		Schema::drop('company_model_fare');
	}

}
