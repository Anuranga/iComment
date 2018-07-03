<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegistrationVehicleChargesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registration_vehicle_charges', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vehicle_model')->index('fk_registration_vehicle_charges_motor_model1_idx');
			$table->float('registration_amount', 10, 0)->nullable();
			$table->float('driverchange_amount', 10, 0)->nullable()->comment('
');
			$table->char('status', 1)->nullable()->comment('A - Active  D - Deactive');
			$table->dateTime('created_time')->nullable();
			$table->dateTime('updated_time')->nullable();
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('registration_vehicle_charges');
	}

}
