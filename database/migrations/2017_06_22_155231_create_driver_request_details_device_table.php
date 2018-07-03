<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverRequestDetailsDeviceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_request_details_device', function(Blueprint $table)
		{
			$table->integer('request_id', true);
			$table->integer('trip_id')->index('ndx_trip_id');
			$table->integer('selected_driver');
			$table->boolean('status')->comment('0 - Available trip, 1- Trip Accepted');
			$table->string('rejected_timeout_drivers', 40);
			$table->dateTime('createdate');
			$table->date('dateonly');
			$table->index(['dateonly','selected_driver'], 'dateonly_selected_driver');
			$table->index(['selected_driver','trip_id'], 'jkndx_driver_trip_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_request_details_device');
	}

}
