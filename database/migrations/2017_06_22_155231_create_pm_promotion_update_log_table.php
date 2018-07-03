<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePmPromotionUpdateLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pm_promotion_update_log', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('DESCRIPTION')->nullable();
			$table->dateTime('UPDATED_AT')->nullable();
			$table->string('UPDATED_BY')->nullable();
			$table->bigInteger('VERSION')->nullable();
			$table->bigInteger('PROMOTION_ID')->nullable()->index('FK3xrjq8o5n3lfbd51dtds0ai2e');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pm_promotion_update_log');
	}

}
