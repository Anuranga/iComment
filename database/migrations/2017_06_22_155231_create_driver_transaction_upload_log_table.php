<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverTransactionUploadLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_transaction_upload_log', function(Blueprint $table)
		{
			$table->integer('id', true);
            $table->integer('transaction_id')->index('driver_transaction_upload_log_transaction_id_idx');
			$table->integer('driver_id');
			$table->string('batch_id', 25);
			$table->integer('payment_category');
			$table->string('authorized_by');
			$table->float('amount', 10, 0);
			$table->string('description');
			$table->string('csv_description')->nullable();
			$table->string('created_by');
			$table->dateTime('created_time');
			$table->integer('removed_by')->nullable();
			$table->dateTime('removed_datetime')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_transaction_upload_log');
	}

}
