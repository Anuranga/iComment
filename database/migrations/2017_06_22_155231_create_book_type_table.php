<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('book_type', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('motor_model_id')->unique('motor_model_id');
			$table->enum('book_now', array('1','0'))->default('0')->comment('1-enable book now,0-disable book now');
			$table->enum('book_later', array('1','0'))->default('0')->comment('1-enable book later,0-disable book later');
			$table->enum('package', array('1','0'))->default('0')->comment('1-enable package,0-disable package');
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
			$table->timestamp('updated_date')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('created_date')->default('0000-00-00 00:00:00');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('book_type');
	}

}
