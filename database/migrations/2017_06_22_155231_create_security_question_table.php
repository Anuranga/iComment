<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSecurityQuestionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('security_question', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('security')->comment('Question');
			$table->boolean('reset_count')->comment('No of times allowed to change');
			$table->string('answer_type', 100)->comment('Data Type');
			$table->boolean('status')->default(0)->comment('0 - Disable, 1 - Enable ');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('security_question');
	}

}
