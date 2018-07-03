<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOwnerVehiclesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('owner_vehicles', function(Blueprint $table)
		{
			$table->integer('id', true);
            $table->integer('ownerid')->index('owner_vehicles_ownerid_idx');
            $table->integer('cid')->index('owner_vehicles_cid_idx');
            $table->integer('model_id')->index('owner_vehicles_model_id_idx');
            $table->integer('taxi_id')->index('owner_vehicles_taxi_id_idx');
			$table->dateTime('created_time');
            $table->integer('created_by')->index('owner_vehicles_created_by_idx');
			$table->dateTime('updated_time')->nullable();
            $table->integer('updated_by')->nullable()->index('owner_vehicles_updated_by_idx');
            $table->unique(['ownerid', 'cid', 'model_id', 'taxi_id'], 'owner_vehicles_ownerid_2_unique');
            $table->unique(['cid', 'model_id', 'taxi_id'], 'owner_vehicles_cid_2_unique');
            $table->unique(['cid', 'model_id', 'taxi_id'], 'owner_vehicles_cid_3_unique');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('owner_vehicles');
	}

}
