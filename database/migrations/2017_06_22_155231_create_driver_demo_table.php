<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverDemoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_demo', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name');
			$table->integer('model');
			$table->enum('trip_status', array('1','2','3','4','5','6'))->nullable()->comment('1-All,2-Online, 3-Active, 4-Free, 5-Busy, 6-Offline');
			$table->enum('demo_type', array('1','2','3'))->comment('1-image, 2-video, 3-audio');
			$table->enum('status', array('A','D'))->nullable()->default('A')->comment('A-Active, D-Deactive');
			$table->string('demo_url');
			$table->dateTime('demo_created_date');
			$table->dateTime('demo_updated_date')->nullable();
			$table->dateTime('demo_createby');
			$table->dateTime('demo_updatedby')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_demo');
	}

}
