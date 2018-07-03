<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDriverBlockedReasonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('driver_blocked_reasons', function(Blueprint $table)
		{
			$table->foreign('created_by', 'driver_blocked_reasons_ibfk_3')->references('id')->on('people')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('driver_id', 'driver_blocked_reasons_ibfk_4')->references('id')->on('people')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('driver_blocked_reasons', function(Blueprint $table)
		{
			$table->dropForeign('driver_blocked_reasons_ibfk_3');
			$table->dropForeign('driver_blocked_reasons_ibfk_4');
		});
	}

}
