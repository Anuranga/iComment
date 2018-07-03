<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCorpTripHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('corp_trip_history', function(Blueprint $table)
		{
			$table->foreign('trip_id', 'corp_trip_history_ibfk_1')->references('passengers_log_id')->on('passengers_log_archive')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('corp_trip_history', function(Blueprint $table)
		{
			$table->dropForeign('corp_trip_history_ibfk_1');
		});
	}

}
