<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverTripTransactionsLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_trip_transactions_log', function(Blueprint $table)
		{
			$table->integer('id', true);
            $table->integer('driver_id')->index('driver_trip_transactions_log_driver_id_idx');
			$table->string('batch_id', 50);
			$table->integer('trip_id');
			$table->float('amount', 10, 0);
			$table->integer('transaction_category');
			$table->integer('bank_name')->nullable();
			$table->integer('dtp_id')->nullable()->comment('// driver_trip_transactions table primary key');
            $table->integer('created_by')->index('driver_trip_transactions_log_created_by_idx');
			$table->dateTime('created_time');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_trip_transactions_log');
	}

}
