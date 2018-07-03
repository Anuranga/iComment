<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPmPromotionUpdateLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pm_promotion_update_log', function(Blueprint $table)
		{
			$table->foreign('PROMOTION_ID', 'FK3xrjq8o5n3lfbd51dtds0ai2e')->references('id')->on('pm_promotion')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pm_promotion_update_log', function(Blueprint $table)
		{
			$table->dropForeign('FK3xrjq8o5n3lfbd51dtds0ai2e');
		});
	}

}
