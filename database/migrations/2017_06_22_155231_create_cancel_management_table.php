<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCancelManagementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cancel_management', function(Blueprint $table)
		{
			$table->integer('cancel_id', true);
			$table->integer('trip_id');
			$table->integer('cancel_message_id');
			$table->text('cancel_message', 65535);
			$table->dateTime('createdate');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cancel_management');
	}

}
