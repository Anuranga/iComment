<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverQualificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_qualifications', function(Blueprint $table)
		{
			$table->integer('driver_id')->primary();
			$table->boolean('national_chauffeur_guide')->default(0);
			$table->boolean('tourist_board_guide')->default(0);
			$table->boolean('tours_and_excursions_specialist')->default(0);
			$table->boolean('other');
			$table->integer('travel_related_qualifications')->comment('1-National Chauffeur ,2 - Guide Tourist Board Guide, 3-  Tours & Excursions Specialist, 4 - Other');
			$table->integer('driver_experience');
			$table->integer('edu_qualifications')->comment('1- Less than 5, 2- 5, 3 -8, 4- o/l, 5-a/l, 6-degreee, 7-master');
			$table->dateTime('created_time')->default('0000-00-00 00:00:00');
			$table->timestamp('updated_time')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('created_by');
			$table->integer('updated_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_qualifications');
	}

}
