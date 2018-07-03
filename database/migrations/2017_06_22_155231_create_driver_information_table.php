<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverInformationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_information', function(Blueprint $table)
		{
			$table->integer('driver_id')->primary();
			$table->string('known_name', 60);
			$table->string('full_name', 60);
			$table->string('email', 60);
			$table->enum('gender', array('1','2'))->default('1')->comment('1- Male, Female');
			$table->date('date_of_birth');
			$table->integer('company_id');
			$table->string('driving_licence_number', 60);
			$table->enum('licence_category', array('1','2'))->default('1');
			$table->date('driver_license_exp_date');
			$table->string('national_id_number', 60);
			$table->date('date_joined');
			$table->dateTime('date_issued')->default('0000-00-00 00:00:00');
			$table->enum('driver_commitment', array('1','2','3'))->comment('1-Full time, 2-Part time, 3-Part time (see the form_config.php also)');
			$table->enum('device_owner', array('1','2','3'))->comment('1-Owned by PickMe, 2-Leased from PickMe, 3-Owned by Driver (see the form_config.php also)');
			$table->integer('registered_branch')->default(1);
			$table->dateTime('created_time')->default('0000-00-00 00:00:00');
			$table->timestamp('updated_time')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('created_by');
			$table->integer('updated_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_information');
	}

}
