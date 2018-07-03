<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverContactInformationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_contact_information', function(Blueprint $table)
		{
			$table->integer('contact_information_id', true);
			$table->integer('driver_id');
			$table->string('reachable_number', 10);
			$table->string('secondary_number', 10);
			$table->string('emegency_contact', 10);
			$table->string('address');
			$table->integer('starting_district')->default(1);
			$table->string('starting_city', 60);
			$table->string('referee1');
			$table->string('referee2');
			$table->dateTime('created_time')->default('0000-00-00 00:00:00');
			$table->dateTime('updated_time')->default('0000-00-00 00:00:00');
			$table->integer('created_by');
			$table->integer('updated_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_contact_information');
	}

}
