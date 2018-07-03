<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAuthTokensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('auth_tokens', function(Blueprint $table)
		{
			$table->integer('token_id', true);
			$table->integer('user_id')->comment('P-primary of passenger, D-primary of people');
			$table->char('user_type', 1)->comment('P-Passenger, D-Driver');
			$table->text('token', 65535);
			$table->timestamp('created_time')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('auth_tokens');
	}

}
