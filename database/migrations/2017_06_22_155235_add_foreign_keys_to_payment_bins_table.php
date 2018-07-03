<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPaymentBinsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('payment_bins', function(Blueprint $table)
		{
			$table->foreign('vendor', 'payment_bins_ibfk_1')->references('id')->on('payment_card_types')->onUpdate('RESTRICT')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('payment_bins', function(Blueprint $table)
		{
			$table->dropForeign('payment_bins_ibfk_1');
		});
	}

}
