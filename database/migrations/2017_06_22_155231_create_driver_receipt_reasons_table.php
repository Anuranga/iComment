<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverReceiptReasonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_receipt_reasons', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('reason', 250);
			$table->integer('payment_category');
			$table->enum('active_status', array('1','0'))->default('1');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_receipt_reasons');
	}

}
