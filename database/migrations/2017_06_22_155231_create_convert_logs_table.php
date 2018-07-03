<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConvertLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('convert_logs', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('trip_id');
			$table->boolean('status')->default(1)->comment('1-Converted, 2-Paid');
			$table->dateTime('created_date');
			$table->integer('created_by');
			$table->dateTime('updated_at')->nullable();
			$table->integer('updated_by')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('convert_logs');
	}

}
