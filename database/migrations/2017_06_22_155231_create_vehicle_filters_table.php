<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehicleFiltersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicle_filters', function(Blueprint $table)
		{
			$table->integer('filter_id', true);
			$table->string('filter_name', 100);
			$table->string('parameter_name', 100);
			$table->enum('filter_status', array('1','0'))->comment('1- Active, 0-deactivated');
			$table->boolean('motor_model')->comment('1-tuk, 2-mini, 3-car');
			$table->dateTime('created_time');
			$table->dateTime('updated_time')->default('0000-00-00 00:00:00');
			$table->integer('created_by');
			$table->integer('updated_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicle_filters');
	}

}
