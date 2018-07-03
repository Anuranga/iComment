<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePmUserRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pm_user_role', function(Blueprint $table)
		{
			$table->bigInteger('USER_ID');
			$table->bigInteger('ROLE_ID')->index('FKqya3mavht91misu07yxa5y11m');
			$table->primary(['USER_ID','ROLE_ID']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pm_user_role');
	}

}
