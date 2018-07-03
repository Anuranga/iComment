<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppPortalModuleActionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('app_portal_module_action', function(Blueprint $table)
		{
			$table->integer('app_id');
			$table->integer('app_module_id')->index('fk_client_module_function_client_module1_idx');
			$table->integer('action_id')->index('fk_client_module_action_action1_idx');
			$table->primary(['app_id','app_module_id','action_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('app_portal_module_action');
	}

}
