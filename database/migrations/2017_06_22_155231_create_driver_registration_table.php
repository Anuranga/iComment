<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverRegistrationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_registration', function(Blueprint $table)
		{
			$table->integer('registration_id', true);
            $table->integer('driver_id')->index('driver_registration_driver_id_idx');
			$table->string('driver_name');
			$table->string('model_name', 20);
			$table->string('description');
			$table->integer('amount');
			$table->dateTime('created_time');
            $table->integer('created_by')->index('driver_registration_created_by_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_registration');
	}

}
