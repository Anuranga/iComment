<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePassengerRequestDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('passenger_request_detail', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('passenger_id');
			$table->integer('vehicle_type');
			$table->text('latitude', 65535);
			$table->text('longitude', 65535);
			$table->text('message', 65535);
			$table->dateTime('createdate');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('passenger_request_detail');
	}

}
