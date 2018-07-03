<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDispatcherCancelReasonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dispatcher_cancel_reason', function(Blueprint $table)
		{
			$table->integer('trip_id');
			$table->text('cancel_reason', 65535);
			$table->integer('cancel_by');
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
		Schema::drop('dispatcher_cancel_reason');
	}

}
