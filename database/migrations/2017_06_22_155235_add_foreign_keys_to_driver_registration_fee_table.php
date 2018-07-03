<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDriverRegistrationFeeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('driver_registration_fee', function(Blueprint $table)
		{
			$table->foreign('model_id', 'driver_registration_fee_ibfk_1')->references('model_id')->on('motor_model')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('driver_registration_fee', function(Blueprint $table)
		{
			$table->dropForeign('driver_registration_fee_ibfk_1');
		});
	}

}
