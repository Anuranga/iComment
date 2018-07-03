<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePassengerPromotionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('passenger_promotions', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title');
			$table->text('description', 65535);
			$table->text('url', 65535);
			$table->text('url2', 65535);
			$table->boolean('status')->comment('0 - Disable, 1 - Enable');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('passenger_promotions');
	}

}
