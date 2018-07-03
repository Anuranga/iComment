<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePassengersBlockReasonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('passengers_block_reason', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('passengers_id')->index('fk_passenger_block_reason_passengers1_idx');
			$table->string('block_reason')->nullable();
			$table->dateTime('created_time')->nullable();
			$table->integer('created_by')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('passengers_block_reason');
	}

}
