<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentReversalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment_reversals', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('transaction_id')->index('payment_reversals_ibfk_1');
			$table->boolean('status')->comment('0 - Pending (initiated), 1 - Successful, 2 - Failed');
			$table->integer('type')->nullable()->comment('The transaction type from Interblocks (1 - Authorization, 5 - Void)');
			$table->boolean('reversal_type')->default(0)->comment('0 - Void, 1 - Refund');
			$table->string('description', 500)->default('N/A');
			$table->timestamp('reversal_time')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->boolean('initiation_type')->default(0)->comment('0 - Automated (system), 1 - Manual (user)');
			$table->integer('initiator_user_id')->nullable()->index('initiator_user_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payment_reversals');
	}

}
