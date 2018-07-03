<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSubscriptionAmountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('subscription_amount', function(Blueprint $table)
		{
			$table->foreign('model_id', 'subscription_amount_ibfk_1')->references('model_id')->on('motor_model')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('subscription_amount', function(Blueprint $table)
		{
			$table->dropForeign('subscription_amount_ibfk_1');
		});
	}

}
