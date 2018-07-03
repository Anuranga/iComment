<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripFiltersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip_filters', function(Blueprint $table)
		{
			$table->integer('trip_filer_id', true);
            $table->integer('passengers_log_id')->index('trip_filters_passengers_log_id_idx');
            $table->integer('filter_id')->index('trip_filters_filter_id_idx');
            $table->integer('filter_price_id')->index('trip_filters_filter_price_id_idx');
			$table->integer('value');
			$table->timestamp('created_time')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trip_filters');
	}

}
