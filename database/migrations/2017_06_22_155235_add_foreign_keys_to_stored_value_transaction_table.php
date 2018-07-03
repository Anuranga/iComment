<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStoredValueTransactionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('stored_value_transaction', function(Blueprint $table)
		{
			$table->foreign('referance_transaction', 'fk_stored_value_transaction_stored_value_transaction1')->references('id')->on('stored_value_transaction')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('stored_value_transaction', function(Blueprint $table)
		{
			$table->dropForeign('fk_stored_value_transaction_stored_value_transaction1');
		});
	}

}
