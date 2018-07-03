<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKioskPaymentLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kiosk_payment_log', function(Blueprint $table)
		{
			$table->integer('kpl_id', true);
			$table->integer('kiosk_order_id')->comment('// kioski orderid');
            $table->integer('transaction_id')->index('kiosk_payment_log_transaction_id_idx')->comment(
                '// driver_trip_transactions primary key'
            );
			$table->float('amount', 10, 0);
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
		Schema::drop('kiosk_payment_log');
	}

}
