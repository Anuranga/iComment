<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBankBranchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bank_branch', function(Blueprint $table)
		{
			$table->integer('branch_code');
			$table->string('branch_name', 200);
			$table->string('region', 200);
			$table->integer('bank_code')->index('bank_code');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bank_branch');
	}

}
