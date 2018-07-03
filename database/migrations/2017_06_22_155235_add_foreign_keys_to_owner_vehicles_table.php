<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOwnerVehiclesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('owner_vehicles', function(Blueprint $table)
		{
			$table->foreign('ownerid', 'owner_vehicles_ibfk_1')->references('ownerid')->on('owner')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('cid', 'owner_vehicles_ibfk_2')->references('cid')->on('company')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('model_id', 'owner_vehicles_ibfk_3')->references('model_id')->on('motor_model')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('taxi_id', 'owner_vehicles_ibfk_4')->references('taxi_id')->on('taxi')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('created_by', 'owner_vehicles_ibfk_5')->references('id')->on('people')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('updated_by', 'owner_vehicles_ibfk_6')->references('id')->on('people')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('owner_vehicles', function(Blueprint $table)
		{
			$table->dropForeign('owner_vehicles_ibfk_1');
			$table->dropForeign('owner_vehicles_ibfk_2');
			$table->dropForeign('owner_vehicles_ibfk_3');
			$table->dropForeign('owner_vehicles_ibfk_4');
			$table->dropForeign('owner_vehicles_ibfk_5');
			$table->dropForeign('owner_vehicles_ibfk_6');
		});
	}

}
