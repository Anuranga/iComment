<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDynamicWaitingChargesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dynamic_waiting_charges', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vehicle_model_id')->nullable()->index('fk_dynamic_waiting_charges_motor_model1_idx');
			$table->integer('geo_location_id')->nullable();
			$table->float('amount', 10, 0)->nullable();
			$table->integer('start_time')->nullable()->comment('Time = Seconds');
			$table->integer('end_time')->nullable()->comment('Time = Seconds');
			$table->dateTime('created_at')->nullable();
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
		Schema::drop('dynamic_waiting_charges');
	}

}
