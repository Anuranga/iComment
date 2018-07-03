<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDriverPaymentDisconnectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('driver_payment_disconnect', function(Blueprint $table)
		{
			$table->foreign('model_id', 'driver_payment_disconnect_ibfk_1')->references('model_id')->on('motor_model')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('driver_payment_disconnect', function(Blueprint $table)
		{
			$table->dropForeign('driver_payment_disconnect_ibfk_1');
		});
	}

}
