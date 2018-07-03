<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRegistrationVehicleChargesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('registration_vehicle_charges', function(Blueprint $table)
		{
			$table->foreign('vehicle_model', 'fk_registration_vehicle_charges_motor_model1')->references('model_id')->on('motor_model')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('registration_vehicle_charges', function(Blueprint $table)
		{
			$table->dropForeign('fk_registration_vehicle_charges_motor_model1');
		});
	}

}
