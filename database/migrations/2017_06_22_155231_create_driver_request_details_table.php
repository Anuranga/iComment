<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverRequestDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_request_details', function(Blueprint $table)
		{
			$table->integer('request_id', true);
            $table->integer('trip_id')->index('driver_request_details_trip_id_idx');
			$table->string('available_drivers', 20);
			$table->string('total_drivers', 20);
			$table->integer('selected_driver');
			$table->text('accepted_driver', 65535);
			$table->integer('status')->comment('0 - Available trip, 1- send to driver and waiting for reply, 2 - Time out request, 3 - Driver accepted the request, 4 - Manager cancelled the request, 10-Auto Cancel by system, 11-same time request');
			$table->text('rejected_timeout_drivers', 65535);
			$table->dateTime('createdate');
            $table->date('dateonly')->index('driver_request_details_dateonly_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_request_details');
	}

}
