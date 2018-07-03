<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAgentCommissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agent_commission', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('cid')->index('cid');
			$table->decimal('commission_amount', 10);
			$table->enum('status', array('A','D'));
			$table->dateTime('created_date');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('agent_commission');
	}

}
