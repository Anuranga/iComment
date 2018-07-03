<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPaymentCardFailuresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('payment_card_failures', function(Blueprint $table)
		{
			$table->foreign('passenger_id', 'payment_card_failures_ibfk_2')->references('passenger_id')->on('payment_wallets')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('payment_card_failures', function(Blueprint $table)
		{
			$table->dropForeign('payment_card_failures_ibfk_2');
		});
	}

}
