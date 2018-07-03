<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePassengersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('passengers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('salutation', 100);
			$table->string('name', 250);
			$table->string('lastname', 250);
            $table->string('email', 100)->index('passengers_email_2_idx');
			$table->text('profile_image', 65535);
			$table->string('password', 100);
			$table->string('org_password');
			$table->string('otp', 100);
			$table->string('phone', 50);
			$table->string('address');
			$table->date('dob')->nullable();
			$table->string('referral_code', 100);
			$table->float('referral_earned_amount', 10, 0);
			$table->enum('referrer_earned', array('0','1'));
			$table->float('discount', 10, 0)->comment('% amount discount per trip');
			$table->string('creditcard_no', 100);
			$table->string('creditcard_cvv', 5);
			$table->string('expdatemonth', 5);
			$table->string('expdateyear', 5);
			$table->text('fb_user_id', 65535);
			$table->text('fb_access_token', 65535);
			$table->text('device_id', 65535);
			$table->text('device_token', 65535);
			$table->integer('device_type')->comment('1 - Android, 2 - Iphone');
			$table->text('fcm_token', 65535)->nullable()->comment('Firebase Push Token');
			$table->integer('push_version')->default(0);
			$table->string('activation_key', 100);
			$table->integer('activation_status');
			$table->integer('login_from')->comment('1 - Website,2 - Mobile , 3 - Facebook');
			$table->timestamp('created_date')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('updated_date')->default('0000-00-00 00:00:00');
			$table->dateTime('last_login')->default('0000-00-00 00:00:00');
			$table->string('login_status', 3)->default('D');
			$table->string('user_status', 5)->comment('A-Active,D-Deactive,I-Inactive,T-Trash');
			$table->integer('referred_by');
			$table->integer('passenger_cid');
			$table->integer('created_by')->default(1)->comment('1->passenger, 2->admin, 3->company,4->Kiosk,5->RoadPickup');
			$table->integer('country_id')->default(1)->comment('primary key of country table');
			$table->boolean('default_payment_method')->default(1)->comment('Default payment method PK of payment_modules');
			$table->date('last_active_date')->default('0000-00-00')->comment('Last time passenger used the app');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('passengers');
	}

}
