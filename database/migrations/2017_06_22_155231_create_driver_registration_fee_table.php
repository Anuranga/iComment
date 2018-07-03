<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverRegistrationFeeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_registration_fee', function(Blueprint $table)
		{
			$table->integer('id', true);
            $table->integer('model_id')->index('driver_registration_fee_model_id_idx');
			$table->integer('amount');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_registration_fee');
	}

}
