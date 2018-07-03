<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPmPromotionUsageHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pm_promotion_usage_history', function(Blueprint $table)
		{
			$table->foreign('PROMOTION_ID', 'FKi2ny515ig7iu2qina2eilwyh9')->references('id')->on('pm_promotion')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pm_promotion_usage_history', function(Blueprint $table)
		{
			$table->dropForeign('FKi2ny515ig7iu2qina2eilwyh9');
		});
	}

}
