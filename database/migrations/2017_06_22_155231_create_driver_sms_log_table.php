<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverSmsLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_sms_log', function(Blueprint $table)
		{
			$table->integer('driver_id')->index('driver_id_2');
			$table->integer('sent_amount')->nullable();
			$table->dateTime('sent_date');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_sms_log');
	}

}
