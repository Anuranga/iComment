<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCorporatePolicyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('corporate_policy', function(Blueprint $table)
		{
			$table->foreign('created_by', 'corporate_policy_ibfk_1')->references('id')->on('people')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('updated_by', 'corporate_policy_ibfk_2')->references('id')->on('people')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('cid', 'corporate_policy_ibfk_3')->references('cid')->on('company')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('corporate_policy', function(Blueprint $table)
		{
			$table->dropForeign('corporate_policy_ibfk_1');
			$table->dropForeign('corporate_policy_ibfk_2');
			$table->dropForeign('corporate_policy_ibfk_3');
		});
	}

}
