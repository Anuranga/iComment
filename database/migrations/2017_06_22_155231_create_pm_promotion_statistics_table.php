<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePmPromotionStatisticsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pm_promotion_statistics', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('USED_COUNT')->nullable();
			$table->bigInteger('USER_ID')->nullable();
			$table->bigInteger('VERIFIED_COUNT')->nullable();
			$table->bigInteger('VERSION')->nullable();
			$table->bigInteger('PROMOTION_ID')->nullable()->index('FKmcnncfsd03j2s0u6w43mbiuo3');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pm_promotion_statistics');
	}

}
