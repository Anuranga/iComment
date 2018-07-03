<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCopyDriverLocationHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('copy_driver_location_history', function(Blueprint $table)
		{
			$table->integer('location_hid', true);
			$table->integer('driver_id');
			$table->integer('trip_id')->index('ndx_driver_location_history');
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
		Schema::drop('copy_driver_location_history');
	}

}
