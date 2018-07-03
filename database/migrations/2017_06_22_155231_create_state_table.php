<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('state', function(Blueprint $table)
		{
			$table->integer('state_id', true);
			$table->string('state_name', 50);
			$table->integer('state_countryid');
			$table->string('state_status', 11)->comment('A- Active , D - Blocked , T- Trash');
			$table->integer('default');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('state');
	}

}
