<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePmPromotionConditionEntityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pm_promotion_condition_entity', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('DESCRIPTION')->nullable();
			$table->string('NAME')->nullable();
			$table->bigInteger('VERSION')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pm_promotion_condition_entity');
	}

}
