<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverSupportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_support', function(Blueprint $table)
		{
			$table->integer('spt_id', true);
			$table->string('spt_support', 100)->unique('spt_support_UNIQUE');
			$table->enum('spt_status', array('A','D'))->default('A')->comment('A - Activate D - Deactive');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_support');
	}

}
