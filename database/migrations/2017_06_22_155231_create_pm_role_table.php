<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePmRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pm_role', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->boolean('ACTIVE', 1);
			$table->string('NAME')->unique('UK_by97c4vmhlcmg2djmhn72ie1a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pm_role');
	}

}
