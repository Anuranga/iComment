<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSurchargeDisagreeMessageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('surcharge_disagree_message', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('passengers_log_id');
			$table->string('message');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('surcharge_disagree_message');
	}

}
