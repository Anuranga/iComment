<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehicleModelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicle_model', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 150);
			$table->integer('motor_model_vehicle_make_id')->index('motor_model_vehicle_make_id');
			$table->enum('status', array('A','D'))->default('D')->comment('A - Active, D - Deactive');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicle_model');
	}

}
