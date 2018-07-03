<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppPortalModuleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('app_portal_module', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('parent_id')->default(0);
			$table->integer('app_id')->index('fk_client_modules_client1_idx');
			$table->string('route', 45);
			$table->string('name', 45)->nullable();
			$table->string('status', 1)->nullable()->default('A')->comment('A - Activated, D - Deactivated');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('app_portal_module');
	}

}
