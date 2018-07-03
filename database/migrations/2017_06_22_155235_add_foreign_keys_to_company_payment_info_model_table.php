<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompanyPaymentInfoModelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('company_payment_info_model', function(Blueprint $table)
		{
			$table->foreign('model_id', 'company_payment_info_model_ibfk_2')->references('model_id')->on('motor_model')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('cid', 'company_payment_info_model_ibfk_3')->references('cid')->on('company_payment_info')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('company_payment_info_model', function(Blueprint $table)
		{
			$table->dropForeign('company_payment_info_model_ibfk_2');
			$table->dropForeign('company_payment_info_model_ibfk_3');
		});
	}

}
