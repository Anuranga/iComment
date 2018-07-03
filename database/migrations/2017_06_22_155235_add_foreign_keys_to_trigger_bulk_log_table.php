<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTriggerBulkLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('trigger_bulk_log', function(Blueprint $table)
		{
			$table->foreign('bid', 'trigger_bulk_log_ibfk_1')->references('id')->on('trigger_bulk')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('trigger_bulk_log', function(Blueprint $table)
		{
			$table->dropForeign('trigger_bulk_log_ibfk_1');
		});
	}

}
