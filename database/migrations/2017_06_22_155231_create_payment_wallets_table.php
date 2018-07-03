<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentWalletsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment_wallets', function(Blueprint $table)
		{
			$table->integer('passenger_id')->primary();
			$table->string('wallet_id', 50)->comment('Wallet ID from interblocks');
			$table->string('first_name', 100);
			$table->string('last_name', 100);
			$table->string('mobile_no', 15);
			$table->string('email', 100)->nullable();
			$table->dateTime('date_created')->default('0000-00-00 00:00:00');
			$table->timestamp('date_updated')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('default_card_id')->nullable()->comment('The card that is set as default for payments');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payment_wallets');
	}

}
