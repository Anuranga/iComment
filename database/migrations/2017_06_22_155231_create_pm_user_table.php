<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePmUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pm_user', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->boolean('ACTIVE', 1);
			$table->string('PASSWORD');
			$table->string('USER_NAME')->unique('UK_42sd78pvnn3n3jjmhs9xaxtel');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pm_user');
	}

}
