<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripAutoCancellationHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip_auto_cancellation_history', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vehicle_type');
			$table->float('amount', 10);
			$table->string('amount_type', 1)->nullable()->comment('P - percentage , A - amount');
			$table->integer('free_count');
			$table->string('is_default', 1)->comment('T - true, F - false');
			$table->string('status', 1)->nullable()->comment('A=active, D=inactive');
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
		Schema::drop('trip_auto_cancellation_history');
	}

}
