<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripAutoCancellationConfigTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip_auto_cancellation_config', function(Blueprint $table)
		{
			$table->integer('vehicle_type')->primary();
			$table->float('amount', 10);
			$table->string('amount_type', 1)->nullable()->comment('P - percentage , A - amount');
			$table->integer('free_count');
			$table->integer('created_by');
			$table->dateTime('created_at');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trip_auto_cancellation_config');
	}

}
