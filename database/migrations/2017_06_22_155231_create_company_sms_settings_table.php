<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanySmsSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_sms_settings', function(Blueprint $table)
		{
			$table->integer('sms_id', true);
			$table->string('company_id');
			$table->string('sms_account_id');
			$table->string('sms_auth_token');
			$table->string('sms_from_number');
			$table->timestamp('created_date')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('company_sms_settings');
	}

}
