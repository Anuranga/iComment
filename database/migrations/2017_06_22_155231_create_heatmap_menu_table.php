<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHeatmapMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('heatmap_menu', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title');
			$table->enum('status', array('A','D'))->default('A')->comment('A - Active, D - Deactive');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('heatmap_menu');
	}

}
