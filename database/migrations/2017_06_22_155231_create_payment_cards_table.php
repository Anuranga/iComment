<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentCardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment_cards', function(Blueprint $table)
		{
			$table->integer('id', true);
            $table->integer('passenger_id')->index('payment_cards_passenger_id_idx');
			$table->string('masked_number', 20)->comment('The masked card number with only the last four digits of the card');
            $table->integer('type_id')->index('payment_cards_type_id_idx')->comment('Type of the card');
			$table->string('card_ref_id', 45)->comment('Card reference ID from interblocks');
			$table->string('region', 1)->comment('Region returned for the card');
			$table->boolean('is_active')->default(0)->comment('0 - Activation failed  1 - Active');
			$table->timestamp('date_added')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->boolean('is_deleted')->default(0)->comment('1 - Card has been deleted');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payment_cards');
	}

}
