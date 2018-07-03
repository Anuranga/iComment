<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaxiInformationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('taxi_information', function(Blueprint $table)
		{
			$table->integer('taxi_id')->primary();
			$table->string('owner_name', 60);
			$table->integer('vehicle_color')->comment('definition table vehicle_colors ');
			$table->integer('brand_model_id')->comment('defenition table taxi_brand_model');
			$table->integer('engine_capacity')->comment('definition table engine_capacity ');
			$table->enum('insuarance_category', array('1','2'))->nullable();
			$table->date('insuarance_exp_date')->nullable();
			$table->timestamp('created_date')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('created_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('taxi_information');
	}

}
