<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToKioskPaymentLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('kiosk_payment_log', function(Blueprint $table)
		{
			$table->foreign('transaction_id', 'kiosk_payment_log_ibfk_1')->references('transaction_id')->on('driver_trip_transactions')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('kiosk_payment_log', function(Blueprint $table)
		{
			$table->dropForeign('kiosk_payment_log_ibfk_1');
		});
	}

}
