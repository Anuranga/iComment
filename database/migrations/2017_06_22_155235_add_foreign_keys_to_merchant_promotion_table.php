<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMerchantPromotionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('merchant_promotion', function(Blueprint $table)
		{
			$table->foreign('merchant_id', 'merchant_promotion_ibfk_1')->references('id')->on('merchant')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('merchant_promotion', function(Blueprint $table)
		{
			$table->dropForeign('merchant_promotion_ibfk_1');
		});
	}

}
