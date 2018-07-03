<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaxiBrandModelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('taxi_brand_model', function(Blueprint $table)
		{
			$table->integer('brand_model_id', true);
			$table->integer('model_id');
			$table->string('brand_name');
			$table->string('brand_name_mobile');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('taxi_brand_model');
	}

}
