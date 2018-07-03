<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentCardFailuresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment_card_failures', function(Blueprint $table)
		{
			$table->integer('id', true);
            $table->integer('passenger_id')->index('payment_card_failures_passenger_id_idx');
			$table->integer('card_type');
			$table->string('masked_card_number', 30);
			$table->string('response_code', 10)->nullable()->comment('Response code as returned by interblocks');
			$table->string('response_message', 250)->nullable()->comment('Response message from Interblocks');
			$table->string('fail_reason', 50)->comment('Simplified fail reason code');
			$table->string('duplicate_wallet_ref', 100)->comment('Duplicated wallet reference from Interblocks');
			$table->dateTime('date_added');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payment_card_failures');
	}

}
