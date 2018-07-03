<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePmPromotionConditionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pm_promotion_condition', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->char('DATA_TYPE', 1)->nullable();
			$table->char('STATUS', 1)->nullable();
			$table->text('VALUE', 65535)->nullable();
			$table->bigInteger('VERSION')->nullable();
			$table->bigInteger('PROMOTION_ID')->nullable()->index('FK7bwxqbj1sf7x3bbfpycnykujr');
			$table->bigInteger('ENTITY_FIELD_ID')->nullable()->index('FKiqtx4s2y6ilbhm5vgbkuoegp');
			$table->bigInteger('PROMOTION_CONDITION_ENTITY_ID')->nullable()->index('FK87aw8r7ln3e4nsi69xwqj7p3m');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pm_promotion_condition');
	}

}
