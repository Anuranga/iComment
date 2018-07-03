<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePassengerFaqTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('passenger_faq', function(Blueprint $table)
		{
			$table->integer('faq_id', true);
			$table->string('faq_title', 250);
			$table->text('faq_details', 65535);
			$table->enum('status', array('A','D','T'));
			$table->timestamp('createdate')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('passenger_faq');
	}

}
