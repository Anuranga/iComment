<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDriverRankingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('driver_ranking', function(Blueprint $table)
		{
			$table->foreign('rank', 'driver_ranking_ibfk_1')->references('id')->on('driver_ranking_definitions')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('driver_ranking', function(Blueprint $table)
		{
			$table->dropForeign('driver_ranking_ibfk_1');
		});
	}

}
