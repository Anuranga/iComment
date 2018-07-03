<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDriverIncentiveLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('driver_incentive_log', function(Blueprint $table)
		{
			$table->foreign('transaction_id', 'driver_incentive_log_ibfk_2')->references('transaction_id')->on('driver_trip_transactions')->onUpdate('RESTRICT')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('driver_incentive_log', function(Blueprint $table)
		{
			$table->dropForeign('driver_incentive_log_ibfk_2');
		});
	}

}
