<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCorporatePolicyMotorModelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('corporate_policy_motor_model', function(Blueprint $table)
		{
			$table->foreign('cpid', 'corporate_policy_motor_model_ibfk_1')->references('cpid')->on('corporate_policy')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('model_id', 'corporate_policy_motor_model_ibfk_2')->references('model_id')->on('motor_model')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('corporate_policy_motor_model', function(Blueprint $table)
		{
			$table->dropForeign('corporate_policy_motor_model_ibfk_1');
			$table->dropForeign('corporate_policy_motor_model_ibfk_2');
		});
	}

}
