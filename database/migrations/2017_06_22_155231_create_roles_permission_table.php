<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolesPermissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('roles_permission', function(Blueprint $table)
		{
			$table->integer('role_id');
			$table->integer('app_id');
			$table->integer('app_module_id');
			$table->integer('action_id');
			$table->primary(['role_id','app_id','app_module_id','action_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('roles_permission');
	}

}
