<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverReceiptTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_receipt', function(Blueprint $table)
		{
			$table->integer('receiptno', true);
            $table->integer('driver_id')->index('driver_receipt_driver_id_idx');
			$table->float('amount', 10, 0);
			$table->string('model_name', 20)->nullable();
			$table->string('driver_name', 100)->nullable();
			$table->string('driver_company', 100)->nullable();
			$table->string('driver_device_no', 100)->nullable();
			$table->string('vehicle_no', 100)->nullable();
			$table->string('description', 100)->nullable();
			$table->dateTime('created_time');
            $table->integer('created_by')->index('driver_receipt_created_by_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_receipt');
	}

}
