<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSiteinfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('siteinfo', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('app_name', 250);
			$table->text('app_description', 65535);
			$table->string('meta_keyword');
			$table->string('meta_description');
			$table->string('email_id', 250);
			$table->string('phone_number', 20);
			$table->string('currency_format', 11);
			$table->integer('continuous_request_time')->nullable()->comment('In seconds - For requesting taxi');
			$table->dateTime('update_date')->default('0000-00-00 00:00:00');
			$table->integer('site_country');
			$table->integer('site_state');
			$table->integer('site_city');
			$table->string('site_currency', 11);
			$table->integer('referral_discount');
			$table->float('admin_commission', 10, 0);
			$table->integer('min_fund');
			$table->integer('max_fund');
			$table->string('site_tagline', 50);
			$table->string('site_copyrights', 250);
			$table->string('site_logo', 500);
			$table->string('email_site_logo', 500);
			$table->text('site_favicon', 65535);
			$table->string('google_geocode_api', 250);
			$table->text('customer_android_key', 65535);
			$table->text('driver_android_key', 65535);
			$table->text('customer_app_url', 65535);
			$table->integer('driver_app_url');
			$table->string('facebook_key', 100);
			$table->string('facebook_secretkey', 100);
			$table->string('twitter_key', 100);
			$table->string('twitter_secretkey', 100);
			$table->text('facebook_share', 65535);
			$table->text('twitter_share', 65535);
			$table->text('google_share', 65535);
			$table->text('linkedin_share', 65535);
			$table->integer('notification_settings')->comment('In seconds');
			$table->text('tell_to_friend_message', 65535);
			$table->integer('driver_tell_to_friend_message');
			$table->integer('sms_enable')->default(0);
			$table->enum('cancellation_fare', array('1','0'));
			$table->enum('default_unit', array('1','0'));
			$table->enum('skip_credit_card', array('1','0'));
			$table->enum('price_settings', array('1','2'))->comment('1 - Admin, 2 - Company');
			$table->integer('pagination_settings')->comment('Regards per page in allover the application');
			$table->enum('show_map', array('1','2','3'))->default('1')->comment('1 - Front end, 2 - Admin Panel , 3- Both Front & Back end ');
			$table->integer('taxi_charge');
			$table->enum('fare_calculation_type', array('1','2','3'))->default('3')->comment('1 => Distance, 2=> Time, 3=> Distance / Time');
			$table->string('sms_account_id');
			$table->string('sms_auth_token');
			$table->string('sms_from_number');
			$table->float('driver_around_mile_in_server', 10, 0);
			$table->float('driver_around_mile_in_passenger', 10, 0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('siteinfo');
	}

}
