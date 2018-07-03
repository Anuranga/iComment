<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDriverSmsLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('driver_sms_log', function(Blueprint $table)
		{
			$table->foreign('driver_id', 'driver_sms_log_ibfk_1')->references('driver_id')->on('driver_trip_transactions')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('driver_sms_log', function(Blueprint $table)
		{
			$table->dropForeign('driver_sms_log_ibfk_1');
		});
	}

}
