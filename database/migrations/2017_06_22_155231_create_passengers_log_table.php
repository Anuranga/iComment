<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePassengersLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('passengers_log', function(Blueprint $table)
		{
			$table->integer('passengers_log_id', true);
			$table->string('booking_key', 200);
            $table->integer('passengers_id')->index('passengers_log_passengers_id_idx');
			$table->string('passenger_name', 50);
            $table->integer('driver_id')->index('passengers_log_driver_id_idx');
			$table->string('driver_name', 50);
			$table->string('driver_phone', 20);
			$table->string('driver_reachable_mobile', 20);
			$table->integer('drivers_count');
            $table->integer('taxi_id')->index('passengers_log_ndx_taxi_id_idx');
			$table->integer('company_id');
			$table->string('company_name', 50);
			$table->string('current_location', 250);
			$table->float('pickup_latitude', 10, 0);
			$table->float('pickup_longitude', 10, 0);
			$table->float('actual_pickup_latitude', 10, 0);
			$table->float('actual_pickup_longitude', 10, 0);
			$table->float('actual_drop_latitude', 10, 0);
			$table->float('actual_drop_longitude', 10, 0);
			$table->string('drop_location', 250);
			$table->float('drop_latitude', 10, 0);
			$table->float('drop_longitude', 10, 0);
			$table->integer('no_passengers')->default(1);
			$table->string('approx_distance', 100)->comment('approximate distance');
			$table->string('approx_duration', 100);
			$table->float('approx_fare', 10, 0)->comment('approximate fare');
			$table->string('time_to_reach_passen', 100);
            $table->dateTime('pickup_time')->index('passengers_log_ndx_pickup_time_idx');
            $table->date('pickup_date')->nullable()->index('passengers_log_passengers_log_pickup_date_idx');
			$table->dateTime('actual_pickup_time');
			$table->dateTime('dispatch_time');
			$table->string('promocode');
			$table->dateTime('drop_time');
			$table->string('pickupdrop', 5)->comment('1- pickup & drop , 0 - No');
			$table->float('distance', 10, 0)->comment('distance which is given by driver when he arrived the destination');
			$table->string('waitingtime', 100)->comment('in mins');
			$table->integer('rating');
			$table->text('comments', 65535);
			$table->integer('travel_status')->comment('0 - Not Completed, 1- Completed, 2 - In progress, 3 - Start To Pickup, 4 - Cancel by Passenger, 5 - Waiting for Payment, 6 - Missed, 7 - Dispatched, 8 - Cancelled, 9 - Confirmed, 10 - Reassign');
			$table->string('driver_reply', 10)->default('')->comment('A- Accept,R - Reject, C- Canceled');
			$table->enum('notification_status', array('0','1','2','3','4'))->comment('0 - No Notification,1- Driver Arrived,2 - Trip Satrted,3 - Trip completed,4 - Trip fare updated');
			$table->text('driver_comments', 65535);
			$table->enum('msg_status', array('R','U'))->default('U')->comment('\'R-Read\',\'U-Unread\'');
			$table->timestamp('createdate')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->date('create_date')->nullable();
			$table->enum('favourite_trip', array('N','S'))->default('N');
			$table->integer('booking_from')->comment('0 - Website, 1 - Device , 2 - Street Booking');
			$table->integer('search_city');
			$table->integer('sub_logid');
			$table->text('notes_driver', 65535);
			$table->integer('booking_from_cid');
			$table->float('fixedprice', 10, 0);
			$table->float('company_tax', 10, 0)->nullable();
			$table->integer('faretype')->comment('1 â€“ account, 2 â€“ credit card, 3 â€“ cash');
			$table->integer('bookingtype')->default(0)->comment('0 - Now , 1 - Future');
			$table->integer('luggage');
			$table->integer('bookby');
			$table->integer('operator_id');
			$table->text('additional_fields');
			$table->integer('taxi_modelid');
			$table->integer('brand_model_id')->nullable();
			$table->integer('recurrent_type')->default(0);
			$table->integer('recurrent_id');
			$table->integer('controller_rating');
			$table->string('controller_comments', 250);
			$table->integer('account_id');
			$table->integer('accgroup_id');
			$table->integer('now_after');
			$table->boolean('sos_sent')->default(0)->comment('Whether SOS message has been sent for this trip');
			$table->boolean('driver_sos_sent')->default(0)->comment('1-Driver SOS');
			$table->boolean('payment_method')->default(1)->comment('PK of payment_modules');
			$table->boolean('trip_pricing_type')->default(0)->comment('0-normal, 1- surcharge');
			$table->smallInteger('payment_status')->default(0)->comment('0 - Unpaid, 1 - Paid, 2 - Failed');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('passengers_log');
	}

}
