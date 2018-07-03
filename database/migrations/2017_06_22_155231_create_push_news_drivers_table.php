<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePushNewsDriversTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('push_news_drivers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('push_history_id')->nullable();
			$table->integer('model_id')->nullable();
			$table->integer('driver_id')->nullable();
			$table->string('category_flag', 100)->nullable()->comment('0-All,c- CSV upload, if int value then selected model id');
			$table->integer('status')->nullable()->comment('1 - sent, 2 - model mismatch, 3 - not driver,  4 - empty device token, 5 - failed, 6 - delivered, 7 - seen');
			$table->string('error')->nullable()->comment('Error description');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('push_news_drivers');
	}

}
