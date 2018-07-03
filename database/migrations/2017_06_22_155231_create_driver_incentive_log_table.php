<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverIncentiveLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_incentive_log', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('driver_id');
			$table->integer('transaction_id')->index('transaction_id');
			$table->dateTime('created_time')->nullable();
			$table->enum('status', array('1','2'))->nullable();
			$table->integer('transaction_category');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_incentive_log');
	}

}
