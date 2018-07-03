<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverNotificationCountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_notification_count', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('driver_id')->nullable();
			$table->integer('count')->nullable()->default(0);
			$table->integer('type')->nullable()->comment('News - 1
Events - 2');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_notification_count');
	}

}
