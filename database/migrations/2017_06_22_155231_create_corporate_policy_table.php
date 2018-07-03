<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCorporatePolicyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('corporate_policy', function(Blueprint $table)
		{
			$table->integer('cpid', true);
			$table->integer('cid');
			$table->string('policy_name', 100)->nullable();
			$table->time('start_time')->nullable();
			$table->time('end_time')->nullable();
			$table->enum('pre_booking', array('Yes','No'));
			$table->enum('portal_depature', array('Yes','No'));
			$table->enum('passenger_app', array('Yes','No'));
			$table->integer('credit_limit')->nullable();
			$table->enum('status', array('A','D'));
			$table->dateTime('created_time');
			$table->dateTime('updated_time')->nullable();
            $table->integer('created_by')->index('corporate_policy_created_by_idx');
            $table->integer('updated_by')->nullable()->index('corporate_policy_updated_by_idx');
            $table->index(['cid', 'created_by'], 'corporate_policy_cid_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('corporate_policy');
	}

}
