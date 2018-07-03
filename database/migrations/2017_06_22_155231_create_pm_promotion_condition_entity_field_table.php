<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePmPromotionConditionEntityFieldTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pm_promotion_condition_entity_field', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('DESCRIPTION')->nullable();
			$table->string('HANDLER_SERVICE')->nullable();
			$table->string('NAME')->nullable();
			$table->bigInteger('VERSION')->nullable();
			$table->bigInteger('ENTITY_ID')->nullable()->index('FK5jrjnmisar41br67d76vy8qh0');
			$table->bigInteger('PROMOTION_CONDITION_ENTITY_ID')->nullable()->index('FKju76bd60yaqqxfw193njytj5j');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pm_promotion_condition_entity_field');
	}

}
