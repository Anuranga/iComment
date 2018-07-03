<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVehicleFilterPricesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vehicle_filter_prices', function(Blueprint $table)
		{
			$table->foreign('filter_id', 'vehicle_filter_prices_ibfk_1')->references('filter_id')->on('vehicle_filters')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vehicle_filter_prices', function(Blueprint $table)
		{
			$table->dropForeign('vehicle_filter_prices_ibfk_1');
		});
	}

}
