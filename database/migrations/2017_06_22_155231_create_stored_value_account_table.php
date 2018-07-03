<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoredValueAccountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stored_value_account', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('owner_id');
			$table->char('owner_type', 1)->comment('P -Passenger, D- Driver, M-Merchant');
			$table->float('available_balance', 10, 0)->nullable();
			$table->float('ledger_balance', 10, 0)->nullable();
			$table->float('max_account_limit', 10, 0)->nullable();
			$table->float('min_account_limit', 10, 0)->nullable();
			$table->float('max_topup_limit', 10, 0)->nullable();
			$table->float('max_daily_spending_limit', 10, 0)->nullable();
			$table->dateTime('created_datetime')->nullable();
			$table->char('status', 1)->nullable();
			$table->index(['owner_id','owner_type'], 'uk_ower_account');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('stored_value_account');
	}

}
