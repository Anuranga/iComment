<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripFlagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip_flags', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('trip_id')->comment('Trip ID');
			$table->integer('flag_id')->index('flag_id')->comment('Flag ID 1-ITC, 4-ITC Approved, 2-	Suspected Immediate Complete, 5-Suspicious Disapproved');
			$table->unique(['trip_id','flag_id'], 'trip_id_flag_id_unique');
			$table->index(['trip_id','flag_id'], 'trip_id_flag_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trip_flags');
	}

}
