<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStoredValueApprovalPendingTransactionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('stored_value_approval_pending_transaction', function(Blueprint $table)
		{
			$table->foreign('from_account_id', 'fk_stored_value_approval_pending_transaction_stored_value_acc1')->references('id')->on('stored_value_account')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('to_account_id', 'fk_stored_value_approval_pending_transaction_stored_value_acc2')->references('id')->on('stored_value_account')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('referance_transaction_id', 'fk_stored_value_pending_transaction_stored_value_transaction1')->references('id')->on('stored_value_transaction')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('stored_value_approval_pending_transaction', function(Blueprint $table)
		{
			$table->dropForeign('fk_stored_value_approval_pending_transaction_stored_value_acc1');
			$table->dropForeign('fk_stored_value_approval_pending_transaction_stored_value_acc2');
			$table->dropForeign('fk_stored_value_pending_transaction_stored_value_transaction1');
		});
	}

}
