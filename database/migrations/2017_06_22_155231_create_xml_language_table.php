<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXmlLanguageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xml_language', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('lang', 50)->comment('en - English, sh-Sinhala');
			$table->text('xml_string', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xml_language');
	}

}
