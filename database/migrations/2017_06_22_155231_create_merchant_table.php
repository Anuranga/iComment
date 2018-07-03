<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMerchantTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('merchant', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name');
			$table->integer('phone');
			$table->string('address');
			$table->boolean('status')->comment('0 - Deactive, 1 - Active');
			$table->timestamps();
            $table->unique(['name', 'phone', 'address'], 'merchant_merchant_unique');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('merchant');
	}

}
