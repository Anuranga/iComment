<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverPaymentPlanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_payment_plan', function(Blueprint $table)
		{
			$table->integer('payment_plan_id', true);
			$table->string('package_name', 200);
			$table->integer('vehicle_type');
			$table->char('status', 1)->comment('A=active, D=inactive');
			$table->integer('created_by');
			$table->integer('updated_by');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_payment_plan');
	}

}
