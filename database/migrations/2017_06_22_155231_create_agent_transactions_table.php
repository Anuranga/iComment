<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAgentTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agent_transactions', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('cid');
			$table->decimal('paid_commission', 10)->comment('when commission is paid, available commission amount');
			$table->decimal('amount', 10, 3)->comment('pickme paid amout to the company');
			$table->integer('cap_commission_id')->index('cap_commission_id');
			$table->float('pickme_to_pay_corp', 10, 0);
			$table->integer('created_by');
			$table->dateTime('created_time');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('agent_transactions');
	}

}
