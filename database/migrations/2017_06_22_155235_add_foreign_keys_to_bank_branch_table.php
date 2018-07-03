<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBankBranchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bank_branch', function(Blueprint $table)
		{
			$table->foreign('bank_code', 'bank_branch_ibfk_1')->references('id')->on('bank')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bank_branch', function(Blueprint $table)
		{
			$table->dropForeign('bank_branch_ibfk_1');
		});
	}

}
