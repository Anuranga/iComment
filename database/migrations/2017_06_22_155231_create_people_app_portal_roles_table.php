<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeopleAppPortalRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('people_app_portal_roles', function(Blueprint $table)
		{
			$table->integer('people_id');
			$table->integer('app_id')->index('fk_people_client_roles_client1_idx');
			$table->integer('role_id')->index('fk_people_client_roles_roles1_idx');
			$table->primary(['people_id','app_id','role_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('people_app_portal_roles');
	}

}
