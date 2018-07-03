<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyPaymentInfoModelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_payment_info_model', function(Blueprint $table)
		{
			$table->integer('id', true);
            $table->integer('cid')->index('company_payment_info_model_cid_idx');
			$table->integer('model_id')->index('model_id');
			$table->float('amount', 10, 0)->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('company_payment_info_model');
	}

}
