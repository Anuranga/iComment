<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverPaymentInformationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_payment_information', function(Blueprint $table)
		{
			$table->integer('payment_info_id', true);
			$table->integer('driver_id');
			$table->decimal('joining_fee', 10, 4)->default(0.0000);
			$table->dateTime('due_date')->nullable();
			$table->integer('payment_type')->default(1)->comment('1-subscription, 2-commision');
			$table->decimal('service_charge', 10, 4)->default(0.0000);
			$table->decimal('phone_recovery_charge', 10, 4)->default(0.0000);
			$table->dateTime('created_time')->default('0000-00-00 00:00:00');
			$table->timestamp('updated_time')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('created_by')->default(0);
			$table->integer('updated_by')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_payment_information');
	}

}
