<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCorporateRemarkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('corporate_remark', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('trip_id')->index('trip_id_index');
			$table->integer('company_id');
			$table->string('remark');
			$table->dateTime('created_at');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('corporate_remark');
	}

}
