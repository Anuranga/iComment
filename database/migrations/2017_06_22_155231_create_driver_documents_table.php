<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_documents', function(Blueprint $table)
		{
			$table->integer('driver_id')->primary();
			$table->boolean('nic_copy')->default(0);
			$table->boolean('smoke_test_copy')->default(0);
			$table->boolean('gramasewaka_copy')->default(0);
			$table->boolean('vehicle_registration_copy')->default(0);
			$table->boolean('police_report')->default(0);
			$table->boolean('passport_photo')->default(0);
			$table->boolean('driver_licence_copy')->default(0);
			$table->boolean('bank_account_copy')->default(0);
			$table->boolean('vehicle_license_copy')->default(0);
			$table->boolean('leasing_agreement_copy')->default(0);
			$table->boolean('vehicle_insuarance_copy')->default(0);
			$table->boolean('ten_hour_commitment_copy')->default(0);
			$table->boolean('check_billing_proof_copy');
			$table->boolean('owner_nic_copy');
			$table->boolean('no_objection_letter_copy');
			$table->boolean('driver_without_hiring_insurance');
			$table->dateTime('created_time');
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
		Schema::drop('driver_documents');
	}

}
