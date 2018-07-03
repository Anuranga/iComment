<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverShiftHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_shift_history', function(Blueprint $table)
		{
			$table->integer('driver_shift_id', true);
            $table->integer('driver_id')->index('driver_shift_history_driver_id_idx');
			$table->integer('taxi_id');
			$table->text('reason', 65535);
			$table->dateTime('shift_start');
			$table->dateTime('shift_end');
			$table->enum('shift_status', array('0','1'))->default('0')->comment('0-InComplete , 1-Complete');
			$table->date('createdate');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_shift_history');
	}

}
