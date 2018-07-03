<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePassengerProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('passenger_profile', function(Blueprint $table)
		{
			$table->integer('passenger_id')->primary();
			$table->integer('emergency_contact_country_id')->nullable()->index('emergency_contact_country_id');
			$table->integer('emergency_contact_number')->nullable();
			$table->string('emergency_contact_name', 100)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('passenger_profile');
	}

}
