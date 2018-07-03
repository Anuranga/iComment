<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaxiAdditionalFieldTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('taxi_additional_field', function(Blueprint $table)
		{
			$table->integer('taxi_id')->index('taxi_id_2');
			$table->string('ac', 250);
			$table->string('audiosystems', 250);
			$table->string('petallo', 250);
			$table->string('peps', 250);
			$table->string('ok', 250);
			$table->string('room', 250);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('taxi_additional_field');
	}

}
