<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPmPromotionConditionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pm_promotion_condition', function(Blueprint $table)
		{
			$table->foreign('PROMOTION_ID', 'FK7bwxqbj1sf7x3bbfpycnykujr')->references('id')->on('pm_promotion')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('PROMOTION_CONDITION_ENTITY_ID', 'FK87aw8r7ln3e4nsi69xwqj7p3m')->references('id')->on('pm_promotion_condition_entity')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('ENTITY_FIELD_ID', 'FKiqtx4s2y6ilbhm5vgbkuoegp')->references('id')->on('pm_promotion_condition_entity_field')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pm_promotion_condition', function(Blueprint $table)
		{
			$table->dropForeign('FK7bwxqbj1sf7x3bbfpycnykujr');
			$table->dropForeign('FK87aw8r7ln3e4nsi69xwqj7p3m');
			$table->dropForeign('FKiqtx4s2y6ilbhm5vgbkuoegp');
		});
	}

}
