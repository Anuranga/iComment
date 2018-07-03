<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserSuggestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_suggestions', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('subject');
			$table->integer('priority_level');
			$table->string('suggestion');
			$table->string('from');
			$table->integer('created_by');
			$table->dateTime('created_time')->default('0000-00-00 00:00:00');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_suggestions');
	}

}
