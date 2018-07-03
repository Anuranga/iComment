<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverLocationTrobleshootDeleteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_location_trobleshoot_delete', function(Blueprint $table)
		{
			$table->integer('del_id', true);
			$table->text('device_id', 65535);
			$table->dateTime('createdate');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_location_trobleshoot_delete');
	}

}
