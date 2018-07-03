<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBankAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bank_accounts', function(Blueprint $table)
		{
			$table->integer('bank_account_id', true);
			$table->integer('driver_id');
			$table->string('account_number', 15);
			$table->string('bank_name', 60);
			$table->string('branch', 60);
			$table->string('account_holder', 200);
			$table->enum('account_type', array('1','2'));
			$table->dateTime('created_time')->default('0000-00-00 00:00:00');
			$table->dateTime('updated_time')->default('0000-00-00 00:00:00');
			$table->integer('created_by');
			$table->integer('updated_by')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bank_accounts');
	}

}
