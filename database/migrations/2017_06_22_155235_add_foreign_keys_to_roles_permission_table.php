<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRolesPermissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('roles_permission', function(Blueprint $table)
		{
			$table->foreign('role_id', 'fk_role_permission_module_roles1')->references('id')->on('roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('roles_permission', function(Blueprint $table)
		{
			$table->dropForeign('fk_role_permission_module_roles1');
		});
	}

}
