<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStoredValueTransactionDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('stored_value_transaction_detail', function(Blueprint $table)
		{
			$table->foreign('account_id', 'fk_stored_value_transaction_detail_stored_value_account1')->references('id')->on('stored_value_account')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('transaction_id', 'fk_stored_value_transaction_detail_stored_value_transaction1')->references('id')->on('stored_value_transaction')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('stored_value_transaction_detail', function(Blueprint $table)
		{
			$table->dropForeign('fk_stored_value_transaction_detail_stored_value_account1');
			$table->dropForeign('fk_stored_value_transaction_detail_stored_value_transaction1');
		});
	}

}
