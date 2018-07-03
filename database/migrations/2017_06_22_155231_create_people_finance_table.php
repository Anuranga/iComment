<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeopleFinanceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('people_finance', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('p_id')->comment('people_id');
			$table->enum('permission_type', array('1','2','3','6','4'))->comment('1-Void, 2-Recharge,3-Decline, 6-Refund,4-RemoveCards');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('people_finance');
	}

}
