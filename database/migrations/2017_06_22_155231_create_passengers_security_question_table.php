<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePassengersSecurityQuestionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('passengers_security_question', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('passengers_id')->index('passengers_id');
			$table->integer('security_question_id');
			$table->string('answer');
			$table->dateTime('created_at');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('passengers_security_question');
	}

}
