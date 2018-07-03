<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyinfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companyinfo', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('company_cid')->index('fk_company_id');
			$table->string('company_domain', 500);
			$table->string('customer_app_url', 500);
			$table->string('driver_app_url', 500);
			$table->string('company_app_name', 250);
			$table->text('company_app_description');
			$table->string('company_meta_title');
			$table->string('company_meta_keyword');
			$table->string('company_meta_description');
			$table->string('company_email_id', 250);
			$table->string('company_phone_number', 20);
			$table->string('company_currency_format', 11);
			$table->timestamp('company_created_date')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('company_update_date')->default('0000-00-00 00:00:00');
			$table->string('company_currency', 11);
			$table->string('payment_method', 1);
			$table->text('company_paypal_username', 65535);
			$table->text('company_paypal_password');
			$table->text('company_paypal_signature');
			$table->string('company_tagline', 50);
			$table->string('company_copyrights', 250);
			$table->string('company_logo', 500);
			$table->text('company_favicon', 65535);
			$table->string('company_facebook_key', 100);
			$table->string('company_facebook_secretkey', 100);
			$table->text('company_facebook_share', 65535);
			$table->text('company_twitter_share', 65535);
			$table->text('company_google_share', 65535);
			$table->text('company_linkedin_share', 65535);
			$table->integer('company_notification_settings')->comment('In seconds');
			$table->float('company_tax', 10, 0);
			$table->enum('cancellation_fare', array('1','0'))->default('0')->comment('0 -NO,1- Yes');
			$table->enum('company_sms_enable', array('1','0'))->default('0')->comment('1-Enabled,2-Disabled');
			$table->integer('passenger_setting')->default(2)->comment('1 - Server will select the nearest taxi and dispatch, 2 - Passenger able to select the taxi');
			$table->string('company_api_key', 200)->unique('company_api_key');
			$table->string('company_time_zone', 100);
			$table->string('home_page_title', 500);
			$table->text('home_page_content');
			$table->enum('default_unit', array('1','0'))->default('1')->comment('0-KM , 1-MILES');
			$table->enum('skip_credit_card', array('1','0'))->default('1')->comment('1-Skip , 0-No-Skip');
			$table->enum('fare_calculation_type', array('1','2','3'))->default('3')->comment('1 => Distance, 2=> Time, 3=> Distance / Time');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('companyinfo');
	}

}
