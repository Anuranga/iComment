<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPaymentCardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('payment_cards', function(Blueprint $table)
		{
			$table->foreign('type_id', 'payment_cards_ibfk_1')->references('id')->on('payment_card_types')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('passenger_id', 'payment_cards_ibfk_2')->references('passenger_id')->on('payment_wallets')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('payment_cards', function(Blueprint $table)
		{
			$table->dropForeign('payment_cards_ibfk_1');
			$table->dropForeign('payment_cards_ibfk_2');
		});
	}

}
