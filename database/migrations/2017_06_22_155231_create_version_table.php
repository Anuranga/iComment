<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVersionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('version', function(Blueprint $table)
		{
			$table->integer('version_id', true);
			$table->string('version_no')->unique('version_no');
			$table->string('platform');
			$table->string('module');
			$table->string('current_version');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('version');
	}

}
