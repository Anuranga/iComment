<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company', function(Blueprint $table)
		{
			$table->integer('cid', true);
			$table->string('company_name', 250);
			$table->string('company_address', 250);
			$table->text('current_location', 65535);
			$table->string('latitude', 250);
			$table->string('longitude', 250);
			$table->string('bankname', 100);
			$table->string('bankaccount_no', 250);
			$table->integer('company_country');
			$table->integer('company_state');
			$table->integer('company_city');
			$table->string('header_bgcolor', 25);
			$table->string('menu_color', 25);
			$table->string('mouseover_color', 25);
			$table->string('time_zone', 250);
			$table->integer('userid');
			$table->string('company_status', 3)->default('A');
			$table->enum('company_type', array('0','1','2'))->default('0')->comment('0-Company , 1-Kiosk , 2-Corporate');
			$table->integer('drivers_count')->default(500);
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
		Schema::drop('company');
	}

}
