<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentModulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment_modules', function(Blueprint $table)
		{
			$table->integer('pay_mod_id', true);
			$table->string('pay_mod_name', 50);
			$table->string('pay_mod_image', 200);
			$table->integer('pay_mod_active')->nullable();
			$table->timestamp('pay_mod_cd')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('pay_mod_default');
			$table->string('note', 200);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payment_modules');
	}

}
