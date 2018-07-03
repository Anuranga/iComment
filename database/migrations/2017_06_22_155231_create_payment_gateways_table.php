<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentGatewaysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment_gateways', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('payment_gatway', 65535);
			$table->string('description');
			$table->string('currency_code', 50);
			$table->string('currency_symbol', 11);
			$table->char('payment_method', 1)->comment('T=Test, L=Live');
			$table->string('paypal_api_username', 500);
			$table->string('paypal_api_password', 500);
			$table->string('paypal_api_signature', 500);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payment_gateways');
	}

}
