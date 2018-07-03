<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationRecordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donation_records', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('donator_id');
			$table->text('donator_location', 65535);
			$table->text('latitude', 65535);
			$table->text('longitude', 65535);
			$table->dateTime('pickup_time');
			$table->enum('status', array('0','1'))->default('0')->comment('1-Approved');
			$table->integer('motor_model')->default(12);
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
		Schema::drop('donation_records');
	}

}
