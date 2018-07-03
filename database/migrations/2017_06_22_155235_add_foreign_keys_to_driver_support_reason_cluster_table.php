<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDriverSupportReasonClusterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('driver_support_reason_cluster', function(Blueprint $table)
		{
			$table->foreign('spt_id', 'fk_drv_spt')->references('spt_id')->on('driver_support')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('spt_code_id', 'fk_drv_spt_code')->references('code_id')->on('driver_support_reason_code')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('driver_support_reason_cluster', function(Blueprint $table)
		{
			$table->dropForeign('fk_drv_spt');
			$table->dropForeign('fk_drv_spt_code');
		});
	}

}
