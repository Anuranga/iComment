<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePassengersCreditcardDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('passengers_creditcard_details', function(Blueprint $table)
		{
			$table->integer('passenger_cardid', true);
			$table->integer('passenger_id');
			$table->string('passenger_email', 250);
			$table->enum('card_type', array('P','B'))->comment('P - Personal , B - Business');
			$table->text('creditcard_no', 65535)->comment('card encrpted');
			$table->string('creditcard_cvv', 100);
			$table->string('expdatemonth', 100);
			$table->string('expdateyear', 100);
			$table->enum('default_card', array('0','1'));
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
		Schema::drop('passengers_creditcard_details');
	}

}
