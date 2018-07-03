<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCancelReasonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cancel_reason', function(Blueprint $table)
		{
			$table->integer('reason_id', true);
			$table->string('cancel_reason', 200);
			$table->enum('user_type', array('P','D','WR','PB'))->comment('P- Passenger , D-Driver , WR -Went Wrong , PB - Prebooking');
			$table->enum('status', array('A','I'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cancel_reason');
	}

}
