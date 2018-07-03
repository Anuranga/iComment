<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverBreakServiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_break_service', function(Blueprint $table)
		{
			$table->integer('driver_break_service_id', true);
			$table->integer('driver_id');
			$table->integer('taxi_id');
			$table->string('interval_type', 25)->comment('B-Break,S-Service');
			$table->text('reason', 65535);
			$table->dateTime('interval_start');
			$table->dateTime('interval_end');
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
		Schema::drop('driver_break_service');
	}

}
