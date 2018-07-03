<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRequestFundTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('request_fund', function(Blueprint $table)
		{
			$table->integer('requested_id', true);
			$table->integer('company_ownerid')->comment('Company_id');
			$table->integer('company_id');
			$table->integer('amount');
			$table->timestamp('requested_date')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('status')->comment('1=pending,2=approved,3=rejected');
			$table->integer('pay_status')->comment('1=>success,2=>failed,3=>Rejected by admin');
			$table->dateTime('updated_date');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('request_fund');
	}

}
