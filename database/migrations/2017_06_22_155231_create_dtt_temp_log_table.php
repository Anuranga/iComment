<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDttTempLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dtt_temp_log', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('csv_driver_id');
			$table->text('csv_desc', 65535);
			$table->float('csv_amount', 10, 0);
			$table->string('batch_id', 100);
			$table->integer('csv_cat_id');
			$table->string('csv_transaction_type', 10);
			$table->text('batch_desc', 65535);
			$table->boolean('status');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dtt_temp_log');
	}

}
