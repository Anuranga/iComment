<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePassengersLogArchiveTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('passengers_log_archive', function(Blueprint $table)
		{
			$table->integer('passengers_log_id')->primary();
            $table->string('booking_key', 200)->nullable();
            $table->integer('passengers_id')->nullable()->index('passengers_log_archive_passengers_id_idx');
			$table->string('passenger_name', 50);
            $table->integer('driver_id')->nullable()->index('passengers_log_archive_driver_id_idx');
            $table->string('driver_name', 50)->nullable();
            $table->string('driver_phone', 20)->nullable();
            $table->string('driver_reachable_mobile', 20)->nullable();
            $table->integer('drivers_count')->nullable();
            $table->integer('taxi_id')->index('passengers_log_archive_ndx_taxi_id_idx')->nullable();
            $table->integer('company_id')->nullable();
            $table->string('company_name', 50)->nullable();
            $table->string('current_location')->nullable();
            $table->float('pickup_latitude', 10, 0)->nullable();
            $table->float('pickup_longitude', 10, 0)->nullable();
            $table->string('drop_location')->nullable();
            $table->float('drop_latitude', 10, 0)->nullable();
            $table->float('drop_longitude', 10, 0)->nullable();
            $table->integer('no_passengers')->default(1)->nullable();
            $table->string('approx_distance', 100)->comment('approximate distance')->nullable();
            $table->string('approx_duration', 100)->nullable();
            $table->float('approx_fare', 10, 0)->comment('approximate fare')->nullable();
            $table->string('time_to_reach_passen', 100)->nullable();
            $table->dateTime('pickup_time')->index('passengers_log_archive_ndx_pickup_time_idx');
            $table->date('pickup_date')->nullable()->index('passengers_log_archive_passengers_log_pickup_date_idx');
			$table->dateTime('actual_pickup_time');
            $table->dateTime('dispatch_time')->nullable();
            $table->string('promocode')->nullable();
            $table->dateTime('drop_time')->nullable();
            $table->string('pickupdrop', 5)->comment('1- pickup & drop , 0 - No')->nullable();
            $table->float('distance', 10, 0)->comment(
                'distance which is given by driver when he arrived the destination'
            )->nullable();
            $table->string('waitingtime', 100)->comment('in mins')->nullable();
            $table->integer('rating')->nullable();
            $table->text('comments', 65535)->nullable();
            $table->integer('travel_status')->index('passengers_log_archive_travel_status_idx')->comment(
                '0 - Not Completed, 1- Completed, 2 - In progress, 3 - Start To Pickup, 4 - Cancel by Passenger, 5 - Waiting for Payment, 6 - Missed, 7 - Dispatched, 8 - Cancelled, 9 - Confirmed, 10 - Reassign'
            )->nullable();
            $table->string('driver_reply', 10)->default('')->comment('A- Accept,R - Reject, C- Canceled')->nullable();
            $table->enum('notification_status', array('0', '1', '2', '3', '4'))->comment(
                '0 - No Notification,1- Driver Arrived,2 - Trip Satrted,3 - Trip completed,4 - Trip fare updated'
            )->nullable();
            $table->text('driver_comments', 65535)->nullable();
            $table->enum('msg_status', array('R', 'U'))->default('U')->comment('\'R-Read\',\'U-Unread\'')->nullable();
            $table->timestamp('createdate')->default(DB::raw('CURRENT_TIMESTAMP'))->index(
                'passengers_log_archive_ndx_create_date_idx'
            )->nullable();
			$table->date('create_date')->nullable();
            $table->enum('favourite_trip', array('N', 'S'))->default('N')->nullable();
            $table->integer('booking_from')->comment('0 - Website, 1 - Device , 2 - Street Booking')->nullable();
            $table->integer('search_city')->nullable();
            $table->integer('sub_logid')->nullable();
            $table->text('notes_driver', 65535)->nullable();
            $table->integer('booking_from_cid')->index('passengers_log_archive_booking_from_cid_idx')->nullable();
            $table->float('fixedprice', 10, 0)->nullable();
			$table->float('company_tax', 10, 0)->nullable();
            $table->integer('faretype')->comment('1 â€“ account, 2 â€“ credit card, 3 â€“ cash')->nullable();
            $table->integer('bookingtype')->default(0)->comment('0 - Now , 1 - Future')->nullable();
            $table->integer('luggage')->nullable();
            $table->integer('bookby')->comment('1 â€“ Passenger, 2 â€“ Operator')->nullable();
            $table->integer('operator_id')->nullable();
            $table->text('additional_fields')->nullable();
            $table->integer('taxi_modelid')->nullable();
			$table->integer('brand_model_id')->nullable();
            $table->integer('recurrent_type')->default(0)->nullable();
            $table->integer('recurrent_id')->nullable();
            $table->integer('controller_rating')->nullable();
            $table->string('controller_comments', 250)->nullable();
            $table->integer('account_id')->nullable();
            $table->integer('accgroup_id')->nullable();
            $table->integer('now_after')->nullable();
			$table->boolean('sos_sent')->default(0)->comment('Whether SOS message has been sent for this trip');
            $table->boolean('driver_sos_sent')->default(0)->comment('1-Driver SOS')->nullable();
            $table->boolean('payment_method')->default(1)->comment('PK of payment_modules')->nullable();
            $table->boolean('trip_pricing_type')->default(0)->comment('0-normal, 1- surcharge')->nullable();
            $table->smallInteger('payment_status')->default(0)->comment('0 - Unpaid, 1 - Paid, 2 - Failed')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('passengers_log_archive');
	}

}
