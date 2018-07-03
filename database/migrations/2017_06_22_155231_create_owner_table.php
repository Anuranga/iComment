<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOwnerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('owner', function(Blueprint $table)
		{
			$table->integer('ownerid', true);
			$table->string('owner_nic', 11);
			$table->string('name', 200);
			$table->string('email', 75);
			$table->string('phone', 50);
			$table->string('address');
			$table->string('password', 200);
			$table->string('token', 200)->nullable();
			$table->enum('status', array('A','D'));
			$table->dateTime('created_time');
            $table->integer('created_by')->index('owner_created_by_idx');
			$table->dateTime('updated_time')->nullable();
            $table->integer('updated_by')->nullable()->index('owner_updated_by_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('owner');
	}

}
