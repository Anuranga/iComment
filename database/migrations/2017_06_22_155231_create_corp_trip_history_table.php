<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCorpTripHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('corp_trip_history', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('trip_id')->index('trip_id');
			$table->integer('dep_id')->nullable();
			$table->integer('policy_id')->nullable();
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
		Schema::drop('corp_trip_history');
	}

}
