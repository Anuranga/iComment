<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateManageFieldTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('manage_field', function(Blueprint $table)
		{
			$table->integer('field_id', true);
			$table->string('field_labelname', 250);
			$table->string('field_name', 250);
			$table->string('field_type', 250);
			$table->text('field_value');
			$table->integer('field_order');
			$table->string('field_status', 3)->default('A');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('manage_field');
	}

}
