<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpecialEventLocationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('special_event_location', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name');
			$table->string('latitude', 25);
			$table->string('longitude', 25);
			$table->unique(['name','latitude','longitude'], 'specialEventLocationId');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('special_event_location');
	}

}
