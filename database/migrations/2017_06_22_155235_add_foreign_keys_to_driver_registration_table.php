<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDriverRegistrationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('driver_registration', function(Blueprint $table)
		{
			$table->foreign('driver_id', 'driver_registration_ibfk_1')->references('id')->on('people')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('created_by', 'driver_registration_ibfk_2')->references('id')->on('people')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('driver_registration', function(Blueprint $table)
		{
			$table->dropForeign('driver_registration_ibfk_1');
			$table->dropForeign('driver_registration_ibfk_2');
		});
	}

}
