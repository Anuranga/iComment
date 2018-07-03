<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverRejectionListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_rejection_list', function(Blueprint $table)
		{
			$table->integer('driver_rejection_id', true);
			$table->integer('driver_id');
			$table->integer('passengers_log_id');
			$table->integer('passengers_id');
			$table->text('reason', 65535);
			$table->enum('rejection_type', array('0','1','3'))->comment('0 - Time out cancel, 1 - driver rejected');
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
		Schema::drop('driver_rejection_list');
	}

}
