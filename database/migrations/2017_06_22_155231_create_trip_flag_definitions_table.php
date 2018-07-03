<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripFlagDefinitionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip_flag_definitions', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('Flag ID');
			$table->string('name', 50)->comment('Flag name');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trip_flag_definitions');
	}

}
