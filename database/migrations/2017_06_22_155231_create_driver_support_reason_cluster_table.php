<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverSupportReasonClusterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_support_reason_cluster', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('spt_id');
			$table->integer('spt_code_id')->index('fk_drv_spt_code_idx');
			$table->unique(['spt_id','spt_code_id'], 'spt_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_support_reason_cluster');
	}

}
