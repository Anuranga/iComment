<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverTransactionCategoryReasonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_transaction_category_reasons', function(Blueprint $table)
		{
			$table->integer('transaction_category_id', true);
			$table->string('transaction_category_reason');
			$table->enum('transaction_type', array('CREDIT','DEBIT'));
			$table->enum('status', array('0','1'))->comment('// show the field in the driver receipt page');
			$table->boolean('print')->default(0);
			$table->boolean('active_status')->default(1);
			$table->boolean('is_manual')->default(0);
			$table->boolean('is_downloadable')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_transaction_category_reasons');
	}

}
