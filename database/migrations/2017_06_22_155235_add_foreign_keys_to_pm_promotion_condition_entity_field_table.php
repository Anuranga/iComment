<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPmPromotionConditionEntityFieldTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pm_promotion_condition_entity_field', function(Blueprint $table)
		{
			$table->foreign('ENTITY_ID', 'FK5jrjnmisar41br67d76vy8qh0')->references('id')->on('pm_promotion_condition_entity')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('PROMOTION_CONDITION_ENTITY_ID', 'FKju76bd60yaqqxfw193njytj5j')->references('id')->on('pm_promotion_condition_entity')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pm_promotion_condition_entity_field', function(Blueprint $table)
		{
			$table->dropForeign('FK5jrjnmisar41br67d76vy8qh0');
			$table->dropForeign('FKju76bd60yaqqxfw193njytj5j');
		});
	}

}
