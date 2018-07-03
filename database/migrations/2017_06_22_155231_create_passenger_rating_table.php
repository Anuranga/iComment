<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePassengerRatingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('passenger_rating', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('passengers_log_id')->nullable()->index('passengers_log_id');
			$table->integer('passenger_id')->nullable()->index('passenger_id');
			$table->integer('rating');
			$table->string('comments', 250);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('passenger_rating');
	}

}
