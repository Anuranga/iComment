<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCorporatePassengersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('corporate_passengers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('corporate_id');
			$table->integer('dep_id')->nullable();
			$table->integer('passenger_id');
			$table->enum('status', array('A','D'))->default('A')->comment('A-Active, D-DeActive');
			$table->dateTime('createdate');
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
			$table->dateTime('updated_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('corporate_passengers');
	}

}
