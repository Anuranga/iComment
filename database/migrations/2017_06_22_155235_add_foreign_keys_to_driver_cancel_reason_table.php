<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDriverCancelReasonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('driver_cancel_reason', function(Blueprint $table)
		{
			$table->foreign('preason_id', 'driver_cancel_reason_ibfk_1')->references('reason_id')->on('driver_cancel_reason')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('driver_cancel_reason', function(Blueprint $table)
		{
			$table->dropForeign('driver_cancel_reason_ibfk_1');
		});
	}

}
