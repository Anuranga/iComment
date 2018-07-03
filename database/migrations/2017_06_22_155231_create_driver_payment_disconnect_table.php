<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverPaymentDisconnectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_payment_disconnect', function(Blueprint $table)
		{
			$table->integer('dpd_id', true);
            $table->integer('model_id')->index('driver_payment_disconnect_model_id_idx');
			$table->integer('amount');
			$table->integer('new_driver_amount');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_payment_disconnect');
	}

}
