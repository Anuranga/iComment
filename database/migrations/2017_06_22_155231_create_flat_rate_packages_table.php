<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFlatRatePackagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('flat_rate_packages', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vehicle_type')->index('vehicle_type');
			$table->boolean('package_type')->default(0)->comment('0 - Hour, 1 - Day ');
			$table->string('package_name');
			$table->float('min_km', 10, 0);
			$table->float('min_fare', 10, 0);
			$table->float('additional_km_fare', 10, 0);
			$table->float('waiting_time_fare', 10, 0)->default(0);
			$table->float('free_waiting_time', 10, 0)->default(0);
			$table->float('night_fare', 10, 0);
			$table->float('ride_hours', 10, 0);
			$table->float('extra_ride_fare', 10, 0);
			$table->float('driver_bata', 10, 0)->nullable();
			$table->boolean('trip_type')->default(1)->comment('0 - One way, 1 - Return');
			$table->boolean('module')->default(0)->comment('0 - All, 1 - Dispatcher, 2 - Passenger');
			$table->boolean('status')->default(1)->comment('0 - Deactive, 1 - Active');
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('flat_rate_packages');
	}

}
