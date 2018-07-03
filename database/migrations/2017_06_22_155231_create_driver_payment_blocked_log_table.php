<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverPaymentBlockedLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_payment_blocked_log', function(Blueprint $table)
		{
			$table->integer('id', true);
            $table->integer('driver_id')->index('driver_payment_blocked_log_driver_id_idx');
			$table->float('sent_amount', 10, 0);
			$table->dateTime('sent_date');
			$table->string('batch_id', 100);
            $table->integer('created_by')->index('driver_payment_blocked_log_created_by_idx');
			$table->integer('cap_amount');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_payment_blocked_log');
	}

}
