<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaxiSpecialFeaturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('taxi_special_features', function(Blueprint $table)
		{
			$table->integer('taxi_feature_id', true);
			$table->integer('taxi_id')->default(0);
			$table->integer('Feature_id')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('taxi_special_features');
	}

}
