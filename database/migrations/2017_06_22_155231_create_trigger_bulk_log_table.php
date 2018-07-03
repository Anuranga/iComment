<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTriggerBulkLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trigger_bulk_log', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('bid')->index('bid');
			$table->integer('created_by');
			$table->dateTime('created_time');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trigger_bulk_log');
	}

}
