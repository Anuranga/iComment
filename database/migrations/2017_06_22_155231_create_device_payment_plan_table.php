<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDevicePaymentPlanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('device_payment_plan', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('payment_type')->nullable()->comment('1 - Full Payment 2 - Installment');
			$table->float('amount', 10, 0)->nullable();
			$table->char('status', 1)->nullable()->default('A')->comment('A - Active, D - Deactivated,');
			$table->integer('weeks')->nullable();
			$table->float('installment_amount', 10, 0)->nullable()->comment('Payment per week');
			$table->dateTime('created_time')->nullable();
			$table->dateTime('updated_time')->nullable();
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('device_payment_plan');
	}

}
