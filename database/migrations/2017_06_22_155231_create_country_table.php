<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCountryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('country', function(Blueprint $table)
		{
			$table->integer('country_id', true);
			$table->string('country_name', 250);
			$table->string('iso_country_code', 10);
			$table->string('telephone_code', 5);
			$table->string('currency_code', 25);
			$table->string('currency_symbol', 25);
			$table->string('country_status', 3)->default('A')->comment('A- Active , D - Blocked , T- Trash');
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
		Schema::drop('country');
	}

}
