<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMainMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('main_menu', function(Blueprint $table)
		{
			$table->foreign('module_id', 'main_menu_ibfk_1')->references('id')->on('module')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('main_menu', function(Blueprint $table)
		{
			$table->dropForeign('main_menu_ibfk_1');
		});
	}

}
