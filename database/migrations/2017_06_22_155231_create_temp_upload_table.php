<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTempUploadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('temp_upload', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('driver_id');
			$table->text('description', 65535);
			$table->float('amount', 10, 0);
			$table->integer('cat_id');
			$table->string('batch_id');
			$table->text('batch_desc', 65535);
			$table->integer('status')->default(0)->comment('0-initial, 1-start, 2-succuess,3-failed');
			$table->dateTime('start_time');
			$table->dateTime('end_time');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('temp_upload');
	}

}
