<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAuthModulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('auth_modules', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('key', 20)->comment('Unique alphanumeric identifier');
			$table->string('name', 100)->comment('Human readable, descriptive name');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('auth_modules');
	}

}
