<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRecurrBookingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recurr_booking', function(Blueprint $table)
		{
			$table->integer('reid', true);
			$table->integer('passengers_log_id');
			$table->string('labelname', 70);
			$table->date('frmdate');
			$table->date('todate');
			$table->text('days', 65535);
			$table->text('excludedays', 65535);
			$table->text('excludedates', 65535);
			$table->text('specific_dates', 65535);
			$table->integer('companyid');
			$table->integer('recurrent_passengerid');
			$table->string('recurrent_pickuplocation', 250);
			$table->string('recurrent_pickuplatitude', 250);
			$table->string('recurrent_pickuplongitude', 250);
			$table->string('recurrent_droplocation');
			$table->string('recurrent_droplatitude', 250);
			$table->string('recurrent_droplongitude', 250);
			$table->integer('recurrent_noofpassengers');
			$table->string('recurrent_approxdistance', 100);
			$table->string('recurrent_approxduration', 100);
			$table->float('recurrent_approxfare', 10, 0);
			$table->time('recurrent_pickuptime');
			$table->integer('recurrent_city');
			$table->string('recurrent_fixedprice', 200);
			$table->integer('recurrent_faretype');
			$table->integer('recurrent_luggage');
			$table->integer('recurrent_operatorid');
			$table->text('recurrent_additionalfields');
			$table->integer('recurrent_modelid');
			$table->integer('recurrent_accountid');
			$table->integer('recurrent_groupid');
			$table->text('recurrent_notes_driver', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('recurr_booking');
	}

}
