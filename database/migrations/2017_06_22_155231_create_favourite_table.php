<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFavouriteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('favourite', function(Blueprint $table)
		{
			$table->integer('favourite_id', true);
			$table->integer('user_id');
			$table->string('favourite_name', 256);
			$table->text('favourite_address', 65535);
			$table->float('favourite_longitude', 10, 0);
			$table->float('favourite_latitude', 10, 0);
			$table->string('user_type', 2)->comment('P - passenger, D - Driver');
			$table->integer('is_delete')->comment('1 - can be deleted, 0 - can\'t be deleted');
			$table->timestamp('created_date')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('favourite');
	}

}
