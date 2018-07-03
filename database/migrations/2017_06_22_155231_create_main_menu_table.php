<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMainMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('main_menu', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title');
			$table->integer('parent_id')->default(0);
			$table->string('icon_class')->nullable();
			$table->string('action_url');
			$table->enum('status', array('A','D'))->default('D')->comment('A - Active, D - Deactive');
            $table->integer('module_id')->index('main_menu_module_id_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('main_menu');
	}

}
