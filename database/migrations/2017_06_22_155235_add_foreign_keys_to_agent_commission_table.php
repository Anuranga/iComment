<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAgentCommissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('agent_commission', function(Blueprint $table)
		{
			$table->foreign('cid', 'agent_commission_ibfk_1')->references('cid')->on('company')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('agent_commission', function(Blueprint $table)
		{
			$table->dropForeign('agent_commission_ibfk_1');
		});
	}

}
