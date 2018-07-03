<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWalkinDriverTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('walkin_driver', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('driver_id');
			$table->string('name', 150);
			$table->string('reachable_mobile', 100);
			$table->string('reason', 250);
			$table->timestamp('created_date')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('walkin_driver');
	}

}
