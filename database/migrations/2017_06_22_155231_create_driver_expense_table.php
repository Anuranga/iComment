<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverExpenseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_expense', function(Blueprint $table)
		{
			$table->integer('expense_id', true);
			$table->integer('expense_driver_id');
			$table->float('expense_amount', 10, 0);
			$table->integer('expense_type_id');
			$table->enum('payment_type', array('Cash','Card'));
			$table->enum('recurrent', array('0','1'))->comment('0 - Daily Expense, 1 - Recurrent Expense');
			$table->text('notes', 65535);
			$table->dateTime('expense_date');
			$table->dateTime('fromdate');
			$table->dateTime('todate');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_expense');
	}

}
