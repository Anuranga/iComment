<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyPaymentInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_payment_info', function(Blueprint $table)
		{
			$table->integer('cid')->primary();
			$table->enum('company_payment_type', array('1','2'))->comment('1-Subscription, 2-Commission');
			$table->enum('duration', array('1','2'))->nullable()->comment('1-weekly, 2-monthly');
			$table->date('start_date');
			$table->dateTime('created_time');
			$table->dateTime('updated_time');
			$table->integer('created_by')->index('created_by');
			$table->integer('updated_by')->nullable()->index('updated_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('company_payment_info');
	}

}
