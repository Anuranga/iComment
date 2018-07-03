<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOwnerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('owner', function(Blueprint $table)
		{
			$table->foreign('created_by', 'owner_ibfk_1')->references('id')->on('people')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('updated_by', 'owner_ibfk_2')->references('id')->on('people')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('owner', function(Blueprint $table)
		{
			$table->dropForeign('owner_ibfk_1');
			$table->dropForeign('owner_ibfk_2');
		});
	}

}
