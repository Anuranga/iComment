<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoleMainMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('role_main_menu', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('role_id');
			$table->integer('main_menu_id')->index('main_menu_id');
			$table->unique(['role_id','main_menu_id'], 'roleMainMenuId');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('role_main_menu');
	}

}
