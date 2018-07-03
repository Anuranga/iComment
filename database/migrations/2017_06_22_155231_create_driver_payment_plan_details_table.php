<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverPaymentPlanDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_payment_plan_details', function(Blueprint $table)
		{
			$table->integer('package_id', true);
			$table->integer('payment_plan_id')->index('payment_plan_id');
			$table->integer('payment_type_id')->index('payment_type_id');
			$table->float('amount', 10);
			$table->unique(['payment_plan_id','payment_type_id'], 'payment_plan_id_2');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_payment_plan_details');
	}

}
