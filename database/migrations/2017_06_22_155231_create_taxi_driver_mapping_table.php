<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaxiDriverMappingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('taxi_driver_mapping', function(Blueprint $table)
		{
			$table->integer('mapping_id', true);
			$table->integer('mapping_driverid')->index('ndx_mapping_driverid');
			$table->integer('mapping_payment_plan_id');
			$table->integer('mapping_taxiid')->index('ndx_mapping_taxiid');
			$table->integer('mapping_companyid');
			$table->integer('mapping_countryid');
			$table->integer('mapping_stateid');
			$table->integer('mapping_cityid');
			$table->dateTime('mapping_startdate')->default('0000-00-00 00:00:00');
			$table->dateTime('mapping_enddate')->default('0000-00-00 00:00:00');
			$table->integer('mapping_createdby');
			$table->timestamp('mapping_createdate')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('mapping_status', 3)->default('A');
			$table->integer('mapping_updatedby')->nullable();
			$table->dateTime('mapping_updatedate')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('taxi_driver_mapping');
	}

}
