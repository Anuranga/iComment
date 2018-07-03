<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFlatRatePackageTripTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('flat_rate_package_trip', function(Blueprint $table)
		{
			$table->integer('record_id', true);
			$table->integer('trip_id');
			$table->integer('package_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('flat_rate_package_trip');
	}

}
