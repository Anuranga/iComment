<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPeopleAppPortalRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('people_app_portal_roles', function(Blueprint $table)
		{
			$table->foreign('app_id', 'fk_people_client_roles_client1')->references('id')->on('app_portal')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('people_id', 'fk_people_client_roles_people1')->references('id')->on('people')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('role_id', 'fk_people_client_roles_roles1')->references('id')->on('roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('people_app_portal_roles', function(Blueprint $table)
		{
			$table->dropForeign('fk_people_client_roles_client1');
			$table->dropForeign('fk_people_client_roles_people1');
			$table->dropForeign('fk_people_client_roles_roles1');
		});
	}

}
