<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSmtpSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('smtp_settings', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('smtp_host', 150);
			$table->string('smtp_port', 50);
			$table->string('smtp_username', 256);
			$table->string('smtp_password', 128);
			$table->string('transport_layer_security', 50);
			$table->integer('smtp');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('smtp_settings');
	}

}
