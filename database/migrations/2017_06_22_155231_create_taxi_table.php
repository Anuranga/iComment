<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaxiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('taxi', function(Blueprint $table)
		{
			$table->integer('taxi_id', true);
			$table->string('taxi_no', 200);
			$table->string('taxi_type', 250);
			$table->string('taxi_model', 250);
			$table->integer('taxi_company');
			$table->integer('taxi_country');
			$table->integer('taxi_state');
			$table->integer('taxi_city');
			$table->string('taxi_capacity', 250);
			$table->float('taxi_speed', 10, 0)->comment('Taxi Speed per Hour');
			$table->float('max_luggage', 10, 0)->comment('max weight for luggage');
			$table->string('taxi_fare_km', 200);
			$table->text('taxi_image', 65535);
			$table->integer('taxi_sliderimage');
			$table->text('taxi_serializeimage');
			$table->timestamp('taxi_createdate')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('taxi_createdby');
			$table->string('taxi_status', 3)->default('A');
			$table->string('taxi_availability', 3)->default('A');
			$table->dateTime('taxi_updatedate')->default('0000-00-00 00:00:00');
			$table->integer('taxi_updatedby')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('taxi');
	}

}
