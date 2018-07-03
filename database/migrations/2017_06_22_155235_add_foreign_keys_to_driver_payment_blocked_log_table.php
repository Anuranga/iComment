<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDriverPaymentBlockedLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('driver_payment_blocked_log', function(Blueprint $table)
		{
			$table->foreign('driver_id', 'driver_payment_blocked_log_ibfk_2')->references('id')->on('people')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('created_by', 'driver_payment_blocked_log_ibfk_3')->references('id')->on('people')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('driver_payment_blocked_log', function(Blueprint $table)
		{
			$table->dropForeign('driver_payment_blocked_log_ibfk_2');
			$table->dropForeign('driver_payment_blocked_log_ibfk_3');
		});
	}

}
