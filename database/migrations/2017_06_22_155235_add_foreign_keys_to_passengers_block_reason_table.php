<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPassengersBlockReasonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('passengers_block_reason', function(Blueprint $table)
		{
			$table->foreign('passengers_id', 'fk_passenger_block_reason_passengers1')->references('id')->on('passengers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('passengers_block_reason', function(Blueprint $table)
		{
			$table->dropForeign('fk_passenger_block_reason_passengers1');
		});
	}

}
