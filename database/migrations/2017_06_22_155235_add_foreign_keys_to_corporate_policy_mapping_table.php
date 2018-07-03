<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCorporatePolicyMappingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('corporate_policy_mapping', function(Blueprint $table)
		{
			$table->foreign('dep_id', 'corporate_policy_mapping_ibfk_1')->references('dep_id')->on('corporate_department')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('created_by', 'corporate_policy_mapping_ibfk_10')->references('id')->on('people')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('updated_by', 'corporate_policy_mapping_ibfk_11')->references('id')->on('people')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('passenger_id', 'corporate_policy_mapping_ibfk_2')->references('id')->on('passengers_old')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('cpid', 'corporate_policy_mapping_ibfk_3')->references('cpid')->on('corporate_policy')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('dep_id', 'corporate_policy_mapping_ibfk_4')->references('dep_id')->on('corporate_department')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('cid', 'corporate_policy_mapping_ibfk_9')->references('cid')->on('company')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('corporate_policy_mapping', function(Blueprint $table)
		{
			$table->dropForeign('corporate_policy_mapping_ibfk_1');
			$table->dropForeign('corporate_policy_mapping_ibfk_10');
			$table->dropForeign('corporate_policy_mapping_ibfk_11');
			$table->dropForeign('corporate_policy_mapping_ibfk_2');
			$table->dropForeign('corporate_policy_mapping_ibfk_3');
			$table->dropForeign('corporate_policy_mapping_ibfk_4');
			$table->dropForeign('corporate_policy_mapping_ibfk_9');
		});
	}

}
