<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCorporateDepartmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('corporate_department', function(Blueprint $table)
		{
			$table->integer('dep_id', true);
			$table->integer('corporate_company');
			$table->string('dep_name', 100);
			$table->enum('dep_status', array('A','D'))->default('A')->comment('A-Active , D-DeActivate');
			$table->integer('created_by')->nullable();
			$table->dateTime('createdate');
			$table->integer('updated_by')->nullable();
			$table->dateTime('updated_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('corporate_department');
	}

}
