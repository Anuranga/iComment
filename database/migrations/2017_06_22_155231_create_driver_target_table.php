<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverTargetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_target', function(Blueprint $table)
		{
			$table->integer('target_id', true);
			$table->integer('target_driver_id');
			$table->float('target_amount', 10, 0);
			$table->enum('recurrent', array('0','1'))->comment('0 - Daily Target, 1 - Recurrent target');
			$table->dateTime('fromdate');
			$table->dateTime('todate');
			$table->date('target_date');
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
		Schema::drop('driver_target');
	}

}
