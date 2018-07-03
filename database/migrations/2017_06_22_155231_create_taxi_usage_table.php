<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaxiUsageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('taxi_usage', function(Blueprint $table)
		{
			$table->integer('taxi_usage_id', true);
			$table->integer('taxi_id');
			$table->integer('usage_id')->comment('1-wedding,2-Home Coming, 3-Birthday');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('taxi_usage');
	}

}
