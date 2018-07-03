<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFrequentJourneyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('frequent_journey', function(Blueprint $table)
		{
			$table->integer('fjid', true);
			$table->integer('fjuserid');
			$table->string('from_location', 200);
			$table->string('to_location', 200);
			$table->string('journey_name', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('frequent_journey');
	}

}
