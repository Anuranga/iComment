<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverDeviceInstallmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_device_installment', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('device_payment_plan_id')->nullable()->index('fk_driver_installment_device_payment_plan1_idx')->comment('foreign key of device_payment_plan table');
			$table->integer('driver_id')->nullable()->index('fk_driver_installment_people1_idx')->comment('people table id');
			$table->float('balance', 10, 0)->nullable()->comment('payment plan table id');
			$table->char('status', 1)->default('A')->comment('A - Active, D - Deactivated,');
			$table->date('created_date');
			$table->date('updated_date')->nullable();
			$table->integer('created_by');
			$table->integer('updated_by')->nullable();
			$table->integer('execution_days')->default(7);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_device_installment');
	}

}
