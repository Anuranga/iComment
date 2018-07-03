<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPassengerRatingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('passenger_rating', function(Blueprint $table)
		{
			$table->foreign('passengers_log_id', 'passenger_rating_ibfk_1')->references('passengers_log_id')->on('passengers_log_archive')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('passenger_id', 'passenger_rating_ibfk_2')->references('id')->on('passengers_old')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('passenger_rating', function(Blueprint $table)
		{
			$table->dropForeign('passenger_rating_ibfk_1');
			$table->dropForeign('passenger_rating_ibfk_2');
		});
	}

}
