<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPassengerProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('passenger_profile', function(Blueprint $table)
		{
			$table->foreign('emergency_contact_country_id', 'passenger_profile_ibfk_2')->references('country_id')->on('country')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('passenger_profile', function(Blueprint $table)
		{
			$table->dropForeign('passenger_profile_ibfk_2');
		});
	}

}
