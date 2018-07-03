<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverRankingDefinitionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_ranking_definitions', function(Blueprint $table)
		{
			$table->boolean('id')->primary();
			$table->string('definition', 10)->unique('definition');
			$table->boolean('rank')->unique('fk_driver_rank');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_ranking_definitions');
	}

}
