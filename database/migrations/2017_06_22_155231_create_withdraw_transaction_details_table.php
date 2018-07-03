<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWithdrawTransactionDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('withdraw_transaction_details', function(Blueprint $table)
		{
			$table->integer('withdraw_trans_id', true);
			$table->string('requested_id', 32);
			$table->string('correlationid', 56);
			$table->timestamp('timestamp')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('masscapturetime')->default('0000-00-00 00:00:00');
			$table->string('version', 32);
			$table->string('build', 32);
			$table->string('ack', 16);
			$table->string('currencycode', 3);
			$table->decimal('amount', 10);
			$table->string('payer_email');
			$table->string('receiver_email');
			$table->integer('errorcode');
			$table->text('short_message', 65535);
			$table->text('long_message', 65535);
			$table->string('severitycode', 36);
			$table->text('payment_response', 65535);
			$table->string('login_id', 15)->comment('payer logged ip');
			$table->text('user_agent', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('withdraw_transaction_details');
	}

}
