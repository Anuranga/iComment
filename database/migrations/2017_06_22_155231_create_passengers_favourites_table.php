<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePassengersFavouritesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('passengers_favourites', function(Blueprint $table)
		{
			$table->integer('p_favourite_id', true);
			$table->integer('passenger_id');
			$table->text('p_favourite_place', 65535);
			$table->string('p_fav_latitude', 100);
			$table->string('p_fav_longtitute', 100);
			$table->text('d_favourite_place', 65535);
			$table->string('d_fav_latitude', 100);
			$table->string('d_fav_longtitute', 100);
			$table->text('fav_comments', 65535);
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
		Schema::drop('passengers_favourites');
	}

}
