<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverRankingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_ranking', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('driver_id')->index('fk_driver_id_idx');
			$table->boolean('rank')->index('rank');
			$table->float('rating', 4)->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_ranking');
	}

}
