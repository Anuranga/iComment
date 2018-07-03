<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePassengersApiVersionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('passengers_api_version', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('passengers_id');
			$table->string('api_version');
			$table->timestamps();
			$table->unique(['passengers_id','api_version'], 'api');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('passengers_api_version');
	}

}
