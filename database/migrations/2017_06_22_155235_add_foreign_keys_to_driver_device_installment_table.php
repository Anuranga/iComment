<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDriverDeviceInstallmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('driver_device_installment', function(Blueprint $table)
		{
			$table->foreign('device_payment_plan_id', 'fk_driver_installment_device_payment_plan1')->references('id')->on('device_payment_plan')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('driver_device_installment', function(Blueprint $table)
		{
			$table->dropForeign('fk_driver_installment_device_payment_plan1');
		});
	}

}
