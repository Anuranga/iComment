<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTripFiltersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('trip_filters', function(Blueprint $table)
		{
			$table->foreign('passengers_log_id', 'trip_filters_ibfk_1')->references('passengers_log_id')->on('passengers_log_archive')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('filter_id', 'trip_filters_ibfk_2')->references('filter_id')->on('vehicle_filters')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('filter_price_id', 'trip_filters_ibfk_3')->references('filter_price_id')->on('vehicle_filter_prices')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('trip_filters', function(Blueprint $table)
		{
			$table->dropForeign('trip_filters_ibfk_1');
			$table->dropForeign('trip_filters_ibfk_2');
			$table->dropForeign('trip_filters_ibfk_3');
		});
	}

}
