<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoredValueApprovalPendingTransactionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stored_value_approval_pending_transaction', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('to_account_id')->index('fk_stored_value_approval_pending_transaction_stored_value_a_idx1');
			$table->bigInteger('from_account_id')->nullable()->index('fk_stored_value_approval_pending_transaction_stored_value_a_idx');
			$table->char('type', 1)->nullable();
			$table->float('amount', 10, 0)->nullable();
			$table->bigInteger('referance_transaction_id')->nullable()->index('fk_stored_value_pending_transaction_stored_value_transactio_idx');
			$table->string('description', 50)->nullable();
			$table->char('status', 1)->nullable()->comment('P- Approval Pending, A-Accepted, R- Approval Rejected.');
			$table->string('note')->nullable();
			$table->dateTime('created_datetime')->nullable();
			$table->integer('created_user')->nullable();
			$table->char('created_user_type', 1)->nullable();
			$table->dateTime('updated_datetime')->nullable();
			$table->integer('updated_user')->nullable();
			$table->char('updated_user_type', 1)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('stored_value_approval_pending_transaction');
	}

}
