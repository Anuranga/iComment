<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip_invoices', function(Blueprint $table)
		{
			$table->integer('invoice_id', true);
            $table->integer('trip_id')->index('trip_invoices_trip_id_idx');
			$table->float('total_fare', 10, 0);
			$table->float('discount', 10, 0);
			$table->boolean('creation_type')->default(0)->comment('0 - Automated, 1 - Manual');
			$table->integer('created_by')->nullable();
			$table->dateTime('created_time');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trip_invoices');
	}

}
