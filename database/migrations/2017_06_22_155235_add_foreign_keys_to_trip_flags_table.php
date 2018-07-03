<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTripFlagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('trip_flags', function(Blueprint $table)
		{
			$table->foreign('flag_id', 'trip_flags_ibfk_2')->references('id')->on('trip_flag_definitions')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('trip_flags', function(Blueprint $table)
		{
			$table->dropForeign('trip_flags_ibfk_2');
		});
	}

}
