<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCorporatePolicyMotorModelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('corporate_policy_motor_model', function(Blueprint $table)
		{
			$table->integer('cpmmid', true);
            $table->integer('cpid')->index('corporate_policy_motor_model_cpid_idx');
            $table->integer('model_id')->index('corporate_policy_motor_model_model_id_idx');
            $table->unique(['cpid', 'model_id'], 'corporate_policy_motor_model_cpid_2_unique');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('corporate_policy_motor_model');
	}

}
