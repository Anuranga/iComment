<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGlobalItcCommissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('global_itc_commission', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vehicle_type');
			$table->string('commission_type', 1)->nullable()->comment('T - Trip commission, I - Individual commission ');
			$table->float('amount', 10);
			$table->string('amount_type', 1)->nullable()->comment('P - percentage , A - amount');
			$table->integer('free_count');
			$table->string('status', 1)->nullable()->comment('A=active, D=inactive');
			$table->integer('created_by');
			$table->integer('updated_by');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('global_itc_commission');
	}

}
