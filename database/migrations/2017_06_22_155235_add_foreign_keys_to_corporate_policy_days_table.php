<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCorporatePolicyDaysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('corporate_policy_days', function(Blueprint $table)
		{
			$table->foreign('cpid', 'corporate_policy_days_ibfk_1')->references('cpid')->on('corporate_policy')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('corporate_policy_days', function(Blueprint $table)
		{
			$table->dropForeign('corporate_policy_days_ibfk_1');
		});
	}

}
