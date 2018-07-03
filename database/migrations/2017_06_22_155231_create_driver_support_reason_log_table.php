<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverSupportReasonLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_support_reason_log', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('trip_id');
			$table->integer('driver_id');
			$table->string('support', 100);
			$table->string('reason', 100);
			$table->boolean('is_auto')->default(0);
			$table->boolean('status')->default(0);
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_support_reason_log');
	}

}
