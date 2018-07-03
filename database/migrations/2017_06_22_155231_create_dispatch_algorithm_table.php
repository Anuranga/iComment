<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDispatchAlgorithmTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dispatch_algorithm', function(Blueprint $table)
		{
			$table->integer('aid', true);
			$table->integer('labelname')->comment('1 â€“ Server will select the nearest taxi and dispatch 2 â€“ Operator able to select the taxi');
			$table->integer('alg_created_by');
			$table->integer('alg_company_id');
			$table->integer('active')->default(1)->comment('1- active 2 â€“ Deactive');
			$table->integer('hide_customer')->comment('1- active 0 â€“ Deactive');
			$table->integer('hide_droplocation')->comment('1- active 0 â€“ Deactive');
			$table->integer('hide_fare')->comment('1- active 0 â€“ Deactive');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dispatch_algorithm');
	}

}
