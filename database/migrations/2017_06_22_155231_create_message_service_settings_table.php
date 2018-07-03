<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessageServiceSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('message_service_settings', function(Blueprint $table)
		{
			$table->integer('id');
			$table->string('group', 150);
			$table->string('name');
			$table->string('code', 150);
			$table->enum('sms_enabled', array('1','0'))->nullable()->default('0')->comment('1 = enable | 0 = disable');
			$table->enum('push_enabled', array('1','0'))->nullable()->default('0')->comment('1 = enable | 0 = disable');
			$table->enum('email_enabled', array('1','0'))->nullable()->default('0')->comment('1 = enable | 0 = disable');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('message_service_settings');
	}

}
