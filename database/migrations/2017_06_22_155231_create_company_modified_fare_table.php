<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyModifiedFareTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_modified_fare', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('trip_id')->index('company_modified_fare_trip_id');
			$table->integer('passenger_id');
			$table->integer('company_id')->default(0);
			$table->float('min_km', 10, 0);
			$table->float('min_fare', 10, 0);
			$table->float('above_km', 10, 0);
			$table->float('waiting_time', 10, 0)->default(0);
			$table->float('night_fare', 10, 0);
			$table->string('promo_code', 100)->nullable();
			$table->integer('free_waiting_time')->nullable()->default(0);
			$table->float('ride_hours', 10, 0);
			$table->integer('extra_ride_fare');
			$table->integer('model_id');
			$table->string('model_name');
			$table->integer('motor_mid');
			$table->float('base_fare', 10, 0)->default(0);
			$table->float('cancellation_fare', 10, 0)->default(0);
			$table->integer('below_above_km')->default(0);
			$table->integer('below_km')->default(0);
			$table->float('minutes_fare', 10, 0)->default(0);
			$table->time('night_timing_from')->default('00:00:00');
			$table->time('night_timing_to')->default('00:00:00');
			$table->boolean('booking_from')->default(0)->comment('0 - Dispatcher, 1 - Passenger');
			$table->integer('package_id')->default(0);
			$table->integer('package_type')->default(0)->comment('0 - Hour, 1 - Day');
			$table->float('driver_bata', 10, 0)->nullable();
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
		Schema::drop('company_modified_fare');
	}

}
