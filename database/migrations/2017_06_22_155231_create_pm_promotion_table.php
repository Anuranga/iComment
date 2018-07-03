<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePmPromotionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pm_promotion', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->dateTime('ACTIVE_FROM');
			$table->dateTime('ACTIVE_UNTIL');
			$table->string('CODE')->unique('UK_jtvgoo02855j4l6ndl20o9523');
			$table->dateTime('CREATED_AT')->nullable();
			$table->decimal('DISCOUNT_AMOUNT', 19)->nullable();
			$table->char('DISCOUNT_TYPE', 1)->nullable();
			$table->string('NAME')->nullable();
			$table->char('PROMOTION_TYPE', 1);
			$table->string('RULE_FILE')->nullable();
			$table->char('STATUS', 1);
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
		Schema::drop('pm_promotion');
	}

}
