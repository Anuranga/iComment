<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverCancelReasonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_cancel_reason', function(Blueprint $table)
		{
			$table->integer('reason_id', true);
			$table->string('cancel_reason', 200);
			$table->enum('user_type', array('P','D','WR'));
			$table->enum('status', array('A','D'));
			$table->integer('preason_id')->nullable()->index('preason_id');
			$table->integer('expiry_hour')->nullable();
			$table->integer('created_by')->nullable();
			$table->timestamps();
			$table->integer('updated_by')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_cancel_reason');
	}

}
