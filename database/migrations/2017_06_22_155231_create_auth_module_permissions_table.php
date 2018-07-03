<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAuthModulePermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('auth_module_permissions', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('module_id')->index('module_id')->comment('ID of the auth_module');
			$table->integer('user_id')->index('user_id')->comment('ID of the user (from people)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('auth_module_permissions');
	}

}
