<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehicleFilterPricesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicle_filter_prices', function(Blueprint $table)
		{
			$table->integer('filter_price_id', true);
			$table->integer('filter_id')->index('filter_id');
			$table->float('filter_price', 10, 0);
			$table->dateTime('price_from_date');
			$table->dateTime('price_to_date');
			$table->boolean('price_status')->comment('0-Deactive, 1-Active');
			$table->enum('status', array('A','D'))->default('D')->comment('D-Deactive, A-Active');
			$table->dateTime('created_date');
			$table->timestamp('updated_date')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('created_by');
			$table->integer('updated_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicle_filter_prices');
	}

}
