<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePmPromotionUsageHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pm_promotion_usage_history', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->dateTime('CREATED_AT')->nullable();
			$table->decimal('DISCOUNT_AMOUNT', 19)->nullable();
			$table->bigInteger('TRIP_ID')->nullable();
			$table->bigInteger('USER_ID')->nullable();
			$table->bigInteger('VERSION')->nullable();
			$table->bigInteger('PROMOTION_ID')->nullable()->index('FKi2ny515ig7iu2qina2eilwyh9');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pm_promotion_usage_history');
	}

}
