<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCorporatePolicyMappingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('corporate_policy_mapping', function(Blueprint $table)
		{
			$table->integer('cpmid', true);
            $table->integer('cid')->index('corporate_policy_mapping_cid_idx');
			$table->integer('dep_id')->nullable();
			$table->integer('passenger_id')->nullable()->index('passenger_id_u');
            $table->integer('cpid')->index('corporate_policy_mapping_cpid_idx');
			$table->enum('cpm_status', array('A','D'));
			$table->boolean('is_general')->default(0);
			$table->integer('corp_passenger_id')->nullable();
			$table->dateTime('created_time');
			$table->dateTime('updated_time')->nullable();
            $table->integer('created_by')->nullable()->index('corporate_policy_mapping_created_by_idx');
            $table->integer('updated_by')->nullable()->index('corporate_policy_mapping_updated_by_idx');
			$table->index(['dep_id','passenger_id','cpid'], 'dep_id_passenger_id_cpid');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('corporate_policy_mapping');
	}

}
