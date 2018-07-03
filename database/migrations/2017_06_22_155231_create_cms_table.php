<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCmsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cms', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('menu_id');
			$table->string('menu');
			$table->text('meta_title', 65535);
			$table->text('meta_keyword', 65535);
			$table->text('meta_description', 65535);
			$table->text('content', 65535);
			$table->text('alt_tags', 65535);
			$table->string('link');
			$table->integer('status');
			$table->integer('type')->comment('1-CMS,2-IMAGE,3-TAG DESC');
			$table->integer('order');
			$table->string('banner_image1', 500);
			$table->string('banner_image2', 500);
			$table->string('banner_image3', 500);
			$table->string('banner_image4', 500);
			$table->string('banner_image5', 500);
			$table->string('banner_image6', 500);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cms');
	}

}
