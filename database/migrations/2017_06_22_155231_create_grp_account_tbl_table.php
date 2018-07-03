<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGrpAccountTblTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('grp_account_tbl', function(Blueprint $table)
		{
			$table->integer('aid', true);
			$table->string('account_name', 200);
			$table->integer('acc_created_by')->comment('User ID');
			$table->integer('acc_company_id')->comment('Company ID');
			$table->integer('passid');
			$table->integer('limit');
			$table->integer('status')->default(1);
			$table->integer('discount');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('grp_account_tbl');
	}

}
