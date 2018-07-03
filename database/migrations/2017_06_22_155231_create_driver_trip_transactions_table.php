<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverTripTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_trip_transactions', function(Blueprint $table)
		{
			$table->integer('transaction_id', true);
            $table->integer('driver_id')->index('driver_trip_transactions_driver_id_idx')->comment(
                'primary key- driver and people'
            );
            $table->integer('trip_id')->nullable()->index('driver_trip_transactions_trip_id_idx')->comment(
                'foreign key -  passengers log'
            );
			$table->enum('transaction_type', array('CREDIT','DEBIT'));
			$table->integer('transaction_category')->nullable()->comment('1 - Initiating, 2 - Trip Discounts, 3 - Subscription, 4 - Driver Deposit to HNB (Paid to PickMe), 5 - Card Payment, 6 - PickMe Commission,7 - Incentive, 9 - Received, 10 - Paid, 11 - Credit hire paid, 12 - Credit Card Paid, 13 - Pay and Go, 14 - Wallet');
			$table->float('amount', 10, 0);
			$table->text('description', 65535);
			$table->timestamp('created_time')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->date('created_date')->nullable();
			$table->integer('created_by')->comment('primary key passengers log');
            $table->index(['created_date', 'driver_id'], 'driver_trip_transactions_created_date_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_trip_transactions');
	}

}
