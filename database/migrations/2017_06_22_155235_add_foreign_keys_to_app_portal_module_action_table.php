<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAppPortalModuleActionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('app_portal_module_action', function(Blueprint $table)
		{
			$table->foreign('app_id', 'fk_app_portal_module_action_app_portal1')->references('id')->on('app_portal')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('action_id', 'fk_client_module_action_action1')->references('id')->on('action')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('app_module_id', 'fk_client_module_function_client_module1')->references('id')->on('app_portal_module')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('app_portal_module_action', function(Blueprint $table)
		{
			$table->dropForeign('fk_app_portal_module_action_app_portal1');
			$table->dropForeign('fk_client_module_action_action1');
			$table->dropForeign('fk_client_module_function_client_module1');
		});
	}

}
