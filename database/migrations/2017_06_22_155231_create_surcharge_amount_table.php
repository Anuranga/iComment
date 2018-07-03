<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSurchargeAmountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('surcharge_amount', function(Blueprint $table)
		{
            $table->integer('passengers_log_id')->index('surcharge_amount_passengers_log_id_idx');
			$table->float('surcharge_rate', 10, 0);
			$table->integer('surcharge_id')->comment('primary key of the surge price');
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
		Schema::drop('surcharge_amount');
	}

}
