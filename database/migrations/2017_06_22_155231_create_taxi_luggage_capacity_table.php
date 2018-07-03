<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaxiLuggageCapacityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('taxi_luggage_capacity', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('taxi_id');
			$table->integer('capacity')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('taxi_luggage_capacity');
	}

}
