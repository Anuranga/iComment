<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMotorModelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('motor_model', function(Blueprint $table)
		{
			$table->integer('model_id', true);
			$table->string('model_name', 200);
			$table->string('model_status', 3)->default('A');
			$table->integer('orderby');
			$table->string('model_code', 10);
			$table->integer('motor_mid');
			$table->float('base_fare', 10, 0)->comment('Service/Booking Charge');
			$table->float('min_km', 10, 0)->comment('Minimum charge KM');
			$table->float('min_fare', 10, 0)->comment('Minimum fare for below and equal to min_km');
			$table->float('cancellation_fare', 10, 0);
			$table->integer('below_above_km')->comment('Below & Above range KM. ');
			$table->float('below_km', 10, 0)->comment('Fare amount for distance is above the min km and below the range of below_above_km');
			$table->float('above_km', 10, 0)->comment('Fare amount for distance is above the range of below_above_km');
			$table->string('night_charge', 50);
			$table->time('night_timing_from');
			$table->time('night_timing_to');
			$table->float('night_fare', 10, 0);
			$table->string('waiting_time', 200);
			$table->float('minutes_fare', 10, 0)->comment('Fare per minutes');
			$table->float('set_radius_km_fare', 10, 0);
			$table->text('image_name', 65535);
			$table->text('image_name_selected', 65535);
			$table->text('model_real_icon', 65535);
			$table->text('top_view_icon', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('motor_model');
	}

}
