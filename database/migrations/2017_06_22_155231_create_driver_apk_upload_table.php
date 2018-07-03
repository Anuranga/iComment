<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverApkUploadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_apk_upload', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('version_code', 45)->nullable();
			$table->string('version_name', 100)->nullable();
			$table->string('apk_url', 100)->nullable();
			$table->integer('uploaded_by')->nullable();
			$table->char('status', 1)->nullable()->default('D');
			$table->dateTime('created_date')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_apk_upload');
	}

}
