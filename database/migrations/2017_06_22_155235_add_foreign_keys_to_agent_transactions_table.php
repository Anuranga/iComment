<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAgentTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('agent_transactions', function(Blueprint $table)
		{
			$table->foreign('cap_commission_id', 'agent_transactions_ibfk_3')->references('id')->on('agent_commission')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('agent_transactions', function(Blueprint $table)
		{
			$table->dropForeign('agent_transactions_ibfk_3');
		});
	}

}
