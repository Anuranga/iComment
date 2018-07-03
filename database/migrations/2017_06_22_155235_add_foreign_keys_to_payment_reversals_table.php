<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPaymentReversalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('payment_reversals', function(Blueprint $table)
		{
			$table->foreign('transaction_id', 'payment_reversals_ibfk_1')->references('id')->on('payment_transactions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('initiator_user_id', 'payment_reversals_ibfk_2')->references('id')->on('people')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('payment_reversals', function(Blueprint $table)
		{
			$table->dropForeign('payment_reversals_ibfk_1');
			$table->dropForeign('payment_reversals_ibfk_2');
		});
	}

}
