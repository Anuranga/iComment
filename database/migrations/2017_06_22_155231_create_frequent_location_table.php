<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFrequentLocationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('frequent_location', function(Blueprint $table)
		{
			$table->integer('fid', true);
			$table->integer('fuserid');
			$table->string('location_name', 250);
			$table->string('type', 100);
			$table->string('keywords', 250);
			$table->string('location', 250);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('frequent_location');
	}

}
