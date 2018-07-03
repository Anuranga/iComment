<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransacationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transacation', function(Blueprint $table)
		{
			$table->integer('id', true);
            $table->integer('passengers_log_id')->unique('transacation_passengers_log_id_unq');
            $table->string('distance', 25)->comment('distance in KM')->nullable();
            $table->string('actual_distance', 25)->comment('Actual Distance Entry by Driver')->nullable();
            $table->float('tripfare', 10, 0)->comment('Trip fare without Tax and discount')->nullable();
            $table->float('fare', 10, 0)->comment('Total Trip Fare')->nullable();
            $table->float('tips', 10, 0)->nullable();
            $table->string('waiting_time', 25)->comment('In hours')->nullable();
            $table->float('waiting_cost', 10, 0)->nullable();
            $table->string('trip_minutes', 100)->comment('Number of minutes traveled')->nullable();
            $table->float('minutes_fare', 10, 0)->comment('total minutes Fare ')->nullable();
            $table->float('price_type_amount', 10, 0)->comment('price type fare amount')->nullable();
            $table->float('company_tax', 10, 0)->comment('In Amount')->nullable();
            $table->float('passenger_discount', 10, 0)->comment('Discount amount')->nullable();
            $table->float('account_discount', 10, 0)->comment(
                'account discount in amount applicable only trip booked by controller/operator'
            )->nullable();
            $table->float('credits_used', 10, 0)->comment('account limit(Credit) used')->nullable();
            $table->text('remarks', 65535)->nullable();
            $table->string('correlation_id', 50)->nullable();
            $table->string('ack', 25)->nullable();
            $table->string('transaction_id', 50)->nullable();
            $table->string('payment_type', 25)->comment('1 - Cash, 2- Card, 3- Uncard, 4 - Account')->nullable();
            $table->dateTime('order_time')->default('0000-00-00 00:00:00')->nullable();
            $table->float('amt', 10, 0)->nullable();
            $table->char('currency_code', 3)->nullable();
            $table->string('payment_status', 50)->nullable();
            $table->string('pending_reason', 50)->nullable();
            $table->string('reason_code', 50)->nullable();
            $table->integer('captured')->comment('0-NO,1-YES')->nullable();
            $table->integer('invoice_id')->nullable();
            $table->string('trans_packtype', 3)->nullable();
            $table->float('admin_amount', 10, 0)->nullable();
            $table->float('company_amount', 10, 0)->nullable();
            $table->float('referral_amount', 10, 0)->nullable();
            $table->string('nightfare_applicable', 3)->default('0')->nullable();
            $table->float('nightfare', 10, 0)->nullable();
            $table->timestamp('current_date')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable();
            $table->integer('other_fee')->nullable();
            $table->integer('email_receipt')->default(0)->comment('0-notsent, 1-sent')->nullable();
			$table->float('commission_percentage', 10, 0)->nullable()->comment('Pickme Received Commission ');
			$table->float('additional_charge', 10, 0)->nullable()->comment('Filter Charges');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transacation');
	}

}
