<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function(Blueprint $table)
		{
			$table->integer('cid', true);
			$table->integer('contact_cid');
			$table->string('name', 150);
			$table->string('email', 250);
			$table->string('phone', 20);
			$table->string('subject', 500);
			$table->text('message');
			$table->dateTime('sent_date');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contacts');
	}

}
