<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAuthModulePermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('auth_module_permissions', function(Blueprint $table)
		{
			$table->foreign('module_id', 'auth_module_permissions_ibfk_3')->references('id')->on('auth_modules')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_id', 'auth_module_permissions_ibfk_4')->references('id')->on('people')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('auth_module_permissions', function(Blueprint $table)
		{
			$table->dropForeign('auth_module_permissions_ibfk_3');
			$table->dropForeign('auth_module_permissions_ibfk_4');
		});
	}

}
