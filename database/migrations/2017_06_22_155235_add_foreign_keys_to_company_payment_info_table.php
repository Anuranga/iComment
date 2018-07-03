<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompanyPaymentInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('company_payment_info', function(Blueprint $table)
		{
			$table->foreign('created_by', 'company_payment_info_ibfk_2')->references('id')->on('people')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('updated_by', 'company_payment_info_ibfk_3')->references('id')->on('people')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('cid', 'company_payment_info_ibfk_4')->references('cid')->on('company')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('company_payment_info', function(Blueprint $table)
		{
			$table->dropForeign('company_payment_info_ibfk_2');
			$table->dropForeign('company_payment_info_ibfk_3');
			$table->dropForeign('company_payment_info_ibfk_4');
		});
	}

}
