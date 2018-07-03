<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment_transactions', function(Blueprint $table)
		{
			$table->integer('id', true);
            $table->integer('trip_id')->index('payment_transactions_trip_id_idx')->comment(
                'Internal reference ID from the transaction table'
            );
            $table->integer('card_id')->nullable()->index('payment_transactions_card_id_idx');
			$table->string('gateway_reference_id', 50)->nullable()->comment('External reference ID from Interblocks');
			$table->string('bank_reference_id', 50)->nullable()->comment('Bank reference ID "bank_ref_id"');
			$table->float('amount', 10, 0);
			$table->float('commission', 10, 0)->comment('The portion of the transaction retained by PickMe');
			$table->boolean('status')->default(0)->comment('0 - Pending, 1 - Successful, 2 - Void, 3 - Failed,  4 - Void(After Failure), 5 - Refunded, 6 - Settled, 7 - SettlementFailed');
			$table->boolean('initiation_type')->default(0)->comment('0 - Automated, 1 - Manual');
			$table->integer('initiator_id')->nullable()->comment('The user ID of the person who initiated the transaction (if manual)');
			$table->dateTime('date_created')->default('0000-00-00 00:00:00');
			$table->timestamp('date_updated')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('currency_id')->default(0)->comment('0 - LKR');
			$table->string('authcode', 10)->nullable()->comment('The authcode from Interblocks');
			$table->string('fail_reason', 50)->nullable()->comment('The simplified failure reason from Interblocks (if any)');
			$table->string('response_code', 10)->nullable()->comment('Response code from Interblocks');
			$table->string('response_message', 250)->nullable()->comment('Response message from Interblocks');
			$table->boolean('is_last')->default(1)->comment('Whether this is the last record for that trip');
			$table->string('reference_transaction_id', 40);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payment_transactions');
	}

}
