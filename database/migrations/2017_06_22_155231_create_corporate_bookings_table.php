<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCorporateBookingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('corporate_bookings', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('trip_id');
			$table->integer('company_id')->index('company_id');
			$table->integer('agent_id');
			$table->integer('department_id');
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('corporate_bookings');
	}

}
