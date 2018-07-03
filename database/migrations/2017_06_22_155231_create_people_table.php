<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeopleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('people', function(Blueprint $table)
		{
			$table->integer('id', true);
            $table->string('salutation', 100)->nullable();
            $table->string('name', 150)->nullable();
            $table->string('lastname', 250)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('address', 2000)->nullable();
            $table->string('perm_address', 2000)->nullable();
            $table->string('paypal_account', 150)->nullable();
            $table->string('password', 250)->nullable();
			$table->string('hashed_password', 250)->nullable()->comment('PBKDF2 hashed password for authentication: 1000 rounds, HMAC-SHA-1, 32 byte key length – both the salt and the derived key (hash) are hex encoded and stored in the format SALT:HASH');
			$table->string('password_hashed_bc', 100)->nullable();
            $table->string('org_password', 250)->nullable();
            $table->string('username', 50)->nullable();
            $table->string('location', 128)->nullable();
            $table->text('photo', 65535)->nullable();
            $table->text('device_id', 65535)->nullable();
            $table->text('device_token', 65535)->nullable();
            $table->integer('device_type')->comment('1 - Android , 2 - Iphone')->nullable();
            $table->integer('push_version')->default(0)->nullable();
            $table->string('device_imei', 50)->nullable();
			$table->timestamp('created_date')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('updated_date')->default('0000-00-00 00:00:00');
            $table->dateTime('last_login')->default('0000-00-00 00:00:00')->nullable();
            $table->string('login_ip', 20)->nullable();
            $table->string('login_city', 128)->nullable();
            $table->string('login_state', 128)->nullable();
            $table->string('login_country', 128)->nullable();
            $table->integer('login_type')->default(1)->comment(
                '1-ConnectTaxi, 2-Facebook, 3-Twitter,4.Googleplus'
            )->nullable();
            $table->enum('login_status', array('N', 'S'))->default('N')->comment(
                'N - Not logged in, S - logged in'
            )->nullable();
            $table->string('login_from', 50)->comment('W - Website , D - Device')->nullable();
            $table->string('user_type', 5)->comment(
                'A - Admin, C - Company, M - Manager , D - Driver , MD - Moderator, N-Normal, S-Super Admin'
            )->nullable();
            $table->integer('account_type')->default(1)->comment(
                '0-Admin,1-Driver,2-User,3-cc,4-registration,5-IT,6-Accounts,7-DataEntry'
            )->nullable();
            $table->string('timezone', 250)->nullable();
            $table->text('description', 65535)->nullable();
            $table->string('phone', 250)->nullable();
            $table->string('reachable_mobile', 100)->nullable();
            $table->string('secondary_mobile', 250)->nullable();
            $table->string('emegency_mobile', 250)->nullable();
            $table->string('gender', 10)->nullable();
            $table->date('dob')->nullable();
			$table->char('status', 2)->nullable()->comment('\'A\' - Active, \'D\' - Deactivated, \'PD\' -Permanent Deactivated, \'U\' - Unassigned, \'R\' - Recovery');
            $table->string('block_reason', 100)->nullable();
            $table->integer('user_createdby')->nullable();
            $table->integer('company_id')->nullable();
            $table->string('driver_license_id', 200)->nullable();
            $table->text('profile_picture', 65535)->nullable();
            $table->string('availability_status', 3)->default('A')->comment('status for package use')->nullable();
            $table->float('account_balance', 10, 0)->nullable();
            $table->integer('booking_limit')->comment('booking limit for a driver')->nullable();
            $table->float('driver_share', 10, 0)->comment('% of amount for driver per trip')->nullable();
            $table->integer('notification_setting')->nullable();
            $table->string('otp', 250)->nullable();
            $table->string('driver_referral_code', 100)->nullable();
            $table->enum('notification_status', array('0', '1'))->nullable();
			$table->integer('user_updatedby')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('people');
	}

}
