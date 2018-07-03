<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePackageReportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('package_report', function(Blueprint $table)
		{
			$table->integer('upgrade_id', true);
			$table->integer('upgrade_companyid');
			$table->integer('upgrade_packageid');
			$table->string('upgrade_packagename', 250);
			$table->integer('upgrade_no_taxi');
			$table->integer('upgrade_no_driver');
			$table->timestamp('upgrade_date')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('upgrade_startdate')->default('0000-00-00 00:00:00');
			$table->dateTime('upgrade_expirydate')->default('0000-00-00 00:00:00');
			$table->string('upgrade_transactionid', 200);
			$table->string('upgrade_invoiceid', 200);
			$table->string('upgrade_correlationid', 200);
			$table->string('upgrade_ack', 150);
			$table->string('upgrade_pendingreason', 150);
			$table->string('upgrade_reasoncode', 150);
			$table->string('upgrade_currencycode', 150);
			$table->integer('upgrade_capture');
			$table->float('upgrade_amount', 10, 0);
			$table->string('upgrade_type', 50);
			$table->string('upgrade_countrycode', 50);
			$table->integer('upgrade_by');
			$table->string('check_expirydate', 3)->default('S');
			$table->string('check_package_type', 10);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('package_report');
	}

}
