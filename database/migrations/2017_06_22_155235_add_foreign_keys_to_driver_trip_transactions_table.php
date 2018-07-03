<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDriverTripTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('driver_trip_transactions', function(Blueprint $table)
		{
			$table->foreign('driver_id', 'driver_trip_transactions_ibfk_1')->references('id')->on('people')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('driver_id', 'driver_trip_transactions_ibfk_3')->references('id')->on('people')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('driver_trip_transactions', function(Blueprint $table)
		{
			$table->dropForeign('driver_trip_transactions_ibfk_1');
			$table->dropForeign('driver_trip_transactions_ibfk_3');
		});
	}

}
