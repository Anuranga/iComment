<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoredValueTransactionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stored_value_transaction', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->char('type', 1)->nullable()->index('index_type_key')->comment('T- Topup Transaction, C - Charge Transaction, R- Recharge Transaction, V - Reverse Transaction, P- PayOff Transaction');
			$table->float('amount', 10, 0)->nullable();
			$table->string('description', 50)->nullable();
			$table->char('referance_type', 1)->nullable()->comment('T- Trip Transaction,C- Credit Card, V -Vardana');
			$table->string('referance', 50)->nullable();
			$table->string('note', 100)->nullable();
			$table->dateTime('created_datetime')->nullable();
			$table->bigInteger('referance_transaction')->nullable()->index('fk_stored_value_transaction_stored_value_transaction1_idx');
			$table->bigInteger('created_user')->nullable();
			$table->char('created_user_type', 1)->nullable()->comment('P- Passenger, S- PickMe Staff, M- Merchant');
			$table->index(['referance_type','referance'], 'index_referance');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('stored_value_transaction');
	}

}
