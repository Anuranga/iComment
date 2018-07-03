<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverSupportReasonCodeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_support_reason_code', function(Blueprint $table)
		{
			$table->integer('code_id', true);
			$table->string('code', 100)->unique('code_UNIQUE');
			$table->string('description', 200);
			$table->enum('status', array('A','D'))->default('A')->comment('A - Activate D - Deactive');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_support_reason_code');
	}

}
