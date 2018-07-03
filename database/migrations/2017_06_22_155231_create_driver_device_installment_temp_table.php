<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverDeviceInstallmentTempTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_device_installment_temp', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('driver_id');
			$table->float('balance', 10, 0);
			$table->float('installment_amount', 10, 0);
			$table->date('searched_date');
			$table->date('updated_date');
			$table->date('created_date');
			$table->date('installment_date')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_device_installment_temp');
	}

}
