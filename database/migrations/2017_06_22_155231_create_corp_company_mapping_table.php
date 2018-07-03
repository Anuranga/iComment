<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCorpCompanyMappingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('corp_company_mapping', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('dep_id');
			$table->integer('people_id')->index('people_id');
			$table->enum('status', array('A','D'))->default('D')->comment('A - Active, D - Deactive');
			$table->dateTime('createdate');
			$table->unique(['dep_id','people_id'], 'corp_mapping_Id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('corp_company_mapping');
	}

}
