<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPmPromotionStatisticsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pm_promotion_statistics', function(Blueprint $table)
		{
			$table->foreign('PROMOTION_ID', 'FKmcnncfsd03j2s0u6w43mbiuo3')->references('id')->on('pm_promotion')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pm_promotion_statistics', function(Blueprint $table)
		{
			$table->dropForeign('FKmcnncfsd03j2s0u6w43mbiuo3');
		});
	}

}
