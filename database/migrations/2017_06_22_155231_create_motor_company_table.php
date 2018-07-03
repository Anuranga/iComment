<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMotorCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('motor_company', function(Blueprint $table)
		{
			$table->integer('motor_id', true);
			$table->string('motor_name', 200);
			$table->string('motor_status', 3)->default('A')->comment('A- Active , D - Blocked , T- Trash');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('motor_company');
	}

}
