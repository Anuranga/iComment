<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverDeviceInstallmentLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_device_installment_log', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('t_id');
			$table->integer('driver_id');
			$table->float('amount', 10, 0);
			$table->string('batch_id', 100);
			$table->date('generated_date')->comment('// User searched date from the front-end');
			$table->dateTime('created_datetime');
			$table->date('installment_date');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_device_installment_log');
	}

}
