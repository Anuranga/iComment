<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverBlockedReasonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_blocked_reasons', function(Blueprint $table)
		{
			$table->integer('id', true);
            $table->integer('driver_id')->index('driver_blocked_reasons_driver_id_idx');
            $table->integer('reason_id')->index('driver_blocked_reasons_reason_id_idx');
			$table->string('reason', 100)->nullable();
			$table->dateTime('expiry_datetime')->nullable();
			$table->dateTime('created_time');
			$table->string('status', 10);
            $table->integer('created_by')->index('driver_blocked_reasons_created_by_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_blocked_reasons');
	}

}
