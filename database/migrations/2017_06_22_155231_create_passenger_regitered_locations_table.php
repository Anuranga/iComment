<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePassengerRegiteredLocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('passenger_regitered_locations', function(Blueprint $table)
		{
			$table->integer('id', true);
            $table->integer('passenger_id')->unique('passenger_regitered_locations_passenger_id_unq');
			$table->float('lattitude', 10, 0);
			$table->float('longitude', 10, 0);
			$table->timestamp('timestamp')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('passenger_regitered_locations');
	}

}
