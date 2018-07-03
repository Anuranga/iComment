<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAppPortalModuleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('app_portal_module', function(Blueprint $table)
		{
			$table->foreign('app_id', 'fk_client_modules_client1')->references('id')->on('app_portal')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('app_portal_module', function(Blueprint $table)
		{
			$table->dropForeign('fk_client_modules_client1');
		});
	}

}
