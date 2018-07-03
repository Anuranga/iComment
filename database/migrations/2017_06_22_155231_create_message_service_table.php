<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessageServiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('message_service', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('type', 150);
			$table->enum('sms', array('A','D'))->default('D')->comment('A - Active, D - Deactive');
			$table->enum('push_notification', array('A','D'))->default('D')->comment('A - Active, D - Deactive');
			$table->unique(['type','sms','push_notification'], 'messageTypeId');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('message_service');
	}

}
