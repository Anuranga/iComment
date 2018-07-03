<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePushNewsHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('push_news_history', function(Blueprint $table)
		{
			$table->integer('id', true);
            $table->integer('motor_model_id')->index('push_news_history_motor_model_id_idx')->comment(
                'motor_model table'
            );
			$table->string('title');
			$table->text('message', 65535);
			$table->timestamp('sent_date')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('image_url')->nullable();
			$table->enum('message_priority', array('0','1'))->default('0')->comment('0-Normal, 1-Urgent');
			$table->integer('created_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('push_news_history');
	}

}
