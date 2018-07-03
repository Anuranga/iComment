<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverLocationHistoryNewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_location_history_new', function(Blueprint $table)
		{
			$table->integer('location_hid', true);
			$table->integer('driver_id');
            $table->integer('trip_id')->index('driver_location_history_new_trip_id_idx');
			$table->text('active_record');
			$table->float('distance', 10, 0)->comment('calculated by using lat lon given by driver');
			$table->text('free_record');
			$table->enum('status', array('A','F','B','S'));
			$table->timestamp('createdate')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_location_history_new');
	}

}