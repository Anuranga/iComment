<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_events', function(Blueprint $table)
		{
			$table->integer('event_id', true);
			$table->text('event_subject', 65535);
			$table->string('vehicle_type', 100);
			$table->text('event_date', 65535);
			$table->text('start_time', 65535);
			$table->text('end_time', 65535);
			$table->text('venue', 65535);
			$table->text('venue_gps_points', 65535);
			$table->text('description', 65535);
			$table->timestamp('create_date')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_events');
	}

}
