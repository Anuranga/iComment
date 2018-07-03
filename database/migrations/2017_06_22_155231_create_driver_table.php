<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('driver_id')->index('driver_id');
			$table->string('latitude', 25);
			$table->string('longitude', 25);
			$table->enum('status', array('A','F','B','S'))->comment('\'A-Active\',\'F-Free\',\'B-Busy\'');
			$table->string('shift_status', 25)->comment('IN - Shift IN, OUT - Shift OUT ');
			$table->enum('travel_status', array('0','2','3','5','9'))->default('0');
			$table->string('driver_api', 100);
			$table->dateTime('shift_started_at')->nullable();
			$table->dateTime('update_date');
			$table->float('bearing', 10, 0)->default(0);
			$table->string('profile_status', 5)->default('00000')->index('profile_status')->comment('From left to right, 1-MotorModel 2-Company 3-Taxi 4-Driver Blocked 5-TaxiDriverMap');
			$table->integer('vehicle_model')->nullable()->comment('Current vehicle model of the driver');
			$table->integer('current_trip')->nullable()->unique('current_trip')->comment('Current trip of the driver');
			$table->dateTime('trip_assigned_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver');
	}

}
