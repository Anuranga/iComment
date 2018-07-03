<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPaymentCardDeletionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('payment_card_deletions', function(Blueprint $table)
		{
			$table->foreign('card_id', 'payment_card_deletions_ibfk_1')->references('id')->on('payment_cards')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('deleted_by', 'payment_card_deletions_ibfk_2')->references('id')->on('people')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('payment_card_deletions', function(Blueprint $table)
		{
			$table->dropForeign('payment_card_deletions_ibfk_1');
			$table->dropForeign('payment_card_deletions_ibfk_2');
		});
	}

}
