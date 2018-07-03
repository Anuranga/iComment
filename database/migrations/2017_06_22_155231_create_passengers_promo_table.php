<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePassengersPromoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('passengers_promo', function(Blueprint $table)
		{
			$table->integer('passenger_promoid', true);
			$table->enum('promo_type', array('1','2','3','4','5','6'))->default('1')->comment('1-Passenger,2-Driver,3-Corporate,4-PassengerReferral, 5-DriverReferral');
			$table->integer('corporate_company_id')->default(0);
			$table->integer('corporate_dep_id')->nullable()->comment('0-Genaral');
			$table->integer('passenger_id');
			$table->integer('driver_id');
			$table->string('promocode', 100);
			$table->enum('discount_type', array('1','2'))->comment('1-% , 2-Amount');
			$table->string('promo_discount', 100);
			$table->string('vehicle_type', 20)->default('0')->comment('0-All Vehicles ');
			$table->enum('promo_used', array('0','1'));
			$table->float('amount_earned', 10, 0);
			$table->dateTime('start_date');
			$table->dateTime('expire_date');
			$table->text('description', 65535)->nullable();
			$table->integer('promo_limit');
			$table->dateTime('createdate');
			$table->enum('status', array('A','D'))->comment('A-Active, D-Inactive');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('passengers_promo');
	}

}
