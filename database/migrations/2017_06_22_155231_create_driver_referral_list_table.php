<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverReferralListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_referral_list', function(Blueprint $table)
		{
			$table->integer('d_referral_id', true);
			$table->integer('referred_driver_id');
			$table->integer('registered_driver_id');
			$table->enum('referral_status', array('0','1'))->comment('0 - Not Used , 1- Used');
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
		Schema::drop('driver_referral_list');
	}

}
