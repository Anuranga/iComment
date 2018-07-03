<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhoneNumberValidationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('phone_number_validation', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('country_code', 5)->default('94');
			$table->string('phone_number', 50);
			$table->string('OTP', 100);
			$table->char('user_type', 1)->default('P');
			$table->timestamp('timestamp')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->boolean('validated')->default(0)->comment('0-not validated, 1- validated');
			$table->dateTime('createdtime');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('phone_number_validation');
	}

}
