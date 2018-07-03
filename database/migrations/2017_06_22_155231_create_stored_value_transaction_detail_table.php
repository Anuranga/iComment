<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoredValueTransactionDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stored_value_transaction_detail', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('transaction_id')->index('fk_stored_value_transaction_detail_stored_value_transaction_idx');
			$table->bigInteger('account_id')->index('fk_stored_value_transaction_detail_stored_value_account1_idx');
			$table->float('amount', 10, 0)->nullable();
			$table->boolean('is_credit')->nullable()->comment('1- Credit, 0 - Debit');
			$table->dateTime('created_datetime');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('stored_value_transaction_detail');
	}

}
