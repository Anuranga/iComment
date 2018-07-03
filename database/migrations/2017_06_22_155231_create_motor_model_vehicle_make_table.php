<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMotorModelVehicleMakeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('motor_model_vehicle_make', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('motor_model_id');
			$table->integer('vehicle_make_id')->index('vehicle_make_id');
			$table->unique(['motor_model_id','vehicle_make_id'], 'motorModelVehicleMakeId');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('motor_model_vehicle_make');
	}

}
