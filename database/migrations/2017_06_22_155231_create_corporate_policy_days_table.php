<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCorporatePolicyDaysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('corporate_policy_days', function(Blueprint $table)
		{
			$table->integer('cpdid', true);
			$table->integer('cpid')->index('cpid');
			$table->integer('days')->comment('1-Sun, 2-Mon, 3-Tue, 4-Wed, 5-Thur, 6-Fri, 7-Sat');
			$table->unique(['cpid','days'], 'cpid_2');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('corporate_policy_days');
	}

}
