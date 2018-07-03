<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentCardDeletionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment_card_deletions', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('card_id')->index('card_id');
			$table->string('description', 500);
			$table->boolean('deletion_type')->comment('0 - Passenger, 1 - Backend');
			$table->integer('deleted_by')->nullable()->index('deleted_by')->comment('ID of the backend user who initiated the transaction');
			$table->boolean('status')->comment('0 - Pending, 1 - Successful, 2 - Failed');
			$table->dateTime('delete_time');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payment_card_deletions');
	}

}
