<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPmUserRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pm_user_role', function(Blueprint $table)
		{
			$table->foreign('USER_ID', 'FK25c3tfkumsruqe4tvqw08d4cs')->references('id')->on('pm_user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('ROLE_ID', 'FKqya3mavht91misu07yxa5y11m')->references('id')->on('pm_role')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pm_user_role', function(Blueprint $table)
		{
			$table->dropForeign('FK25c3tfkumsruqe4tvqw08d4cs');
			$table->dropForeign('FKqya3mavht91misu07yxa5y11m');
		});
	}

}
