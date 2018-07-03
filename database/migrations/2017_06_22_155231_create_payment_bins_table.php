<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentBinsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment_bins', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('bin')->unique('bin');
			$table->string('country', 2)->nullable();
			$table->integer('vendor')->index('vendor');
			$table->enum('type', array('CREDIT','DEBIT','CHARGE'))->nullable();
			$table->string('level', 30)->nullable();
			$table->string('bank', 200)->nullable();
			$table->integer('support_status')->default(0)->comment('0 - Unknown, 1 - Supported, 2 - Unsupported, 3 - Probably unsupported');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payment_bins');
	}

}
