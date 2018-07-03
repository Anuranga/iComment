<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('city', function(Blueprint $table)
		{
			$table->integer('city_id', true);
			$table->string('city_name', 250);
			$table->string('zipcode', 100);
			$table->integer('city_stateid');
			$table->integer('city_countryid');
			$table->string('city_status', 3)->default('A');
			$table->string('city_model_fare', 5);
			$table->integer('default');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('city');
	}

}
