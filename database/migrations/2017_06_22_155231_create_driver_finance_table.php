<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverFinanceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_finance', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('driver_id')->index('ndx_driver_id');
			$table->float('credit_amount', 10, 0);
			$table->float('debit_amount', 10, 0);
			$table->enum('paid_status', array('0','1'))->comment('0-Pay , 1-Paid');
			$table->dateTime('update_time');
			$table->dateTime('create_time');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_finance');
	}

}
