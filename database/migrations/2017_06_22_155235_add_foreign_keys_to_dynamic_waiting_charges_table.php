<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDynamicWaitingChargesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('dynamic_waiting_charges', function(Blueprint $table)
		{
			$table->foreign('vehicle_model_id', 'fk_dynamic_waiting_charges_motor_model1')->references('model_id')->on('motor_model')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('dynamic_waiting_charges', function(Blueprint $table)
		{
			$table->dropForeign('fk_dynamic_waiting_charges_motor_model1');
		});
	}

}
