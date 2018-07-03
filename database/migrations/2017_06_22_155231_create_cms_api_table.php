<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCmsApiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cms_api', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title');
			$table->text('description', 65535);
			$table->enum('status', array('A','D'))->default('D')->comment('A - Active, D - Deactive');
			$table->integer('created_by');
			$table->integer('updated_by')->nullable();
			$table->timestamp('updated_date')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('created_date')->default('0000-00-00 00:00:00');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cms_api');
	}

}
