<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPaymentTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('payment_transactions', function(Blueprint $table)
		{
			$table->foreign('card_id', 'payment_transactions_ibfk_1')->references('id')->on('payment_cards')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('payment_transactions', function(Blueprint $table)
		{
			$table->dropForeign('payment_transactions_ibfk_1');
		});
	}

}
