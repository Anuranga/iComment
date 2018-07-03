<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePassengersReferralListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('passengers_referral_list', function(Blueprint $table)
		{
			$table->integer('referral_id', true);
			$table->integer('referred_passenger_id');
			$table->integer('registered_passenger_id');
			$table->enum('referral_status', array('0','1'))->comment('0 - Not Used , 1- Used');
			$table->enum('referrer_earned', array('0','1'))->comment('1 - Earned, 0 - Not Earned');
			$table->enum('registerer_earned', array('0','1'));
			$table->integer('registerer_tripid');
			$table->float('earned_amount', 10, 0);
			$table->timestamp('createdate')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('passengers_referral_list');
	}

}
