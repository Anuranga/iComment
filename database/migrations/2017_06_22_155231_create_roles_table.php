<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('roles', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 150);
			$table->string('user_type', 2)->comment('A - Admin, C - Company, M - Manager , D - Driver , MD - Moderator, N-Normal, S-Super Admin');
			$table->string('description');
			$table->enum('status', array('A','D'))->default('D')->comment('A-Active , D-DeActive');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('roles');
	}

}
