<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePackageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('package', function(Blueprint $table)
		{
			$table->integer('package_id', true);
			$table->string('package_name', 250);
			$table->text('package_description');
			$table->string('no_of_taxi', 50);
			$table->string('no_of_driver', 50);
			$table->string('no_of_trans', 50);
			$table->string('package_price', 200);
			$table->string('days_expire', 50);
			$table->string('commission_admin', 3)->default('S');
			$table->string('package_type', 10)->comment('T-Transaction Based Commission : Company no need to pay for Package, Company owner and  Admin will get the commission for every Transaction. P - Package Based Commission : Company need to pay for package, Company owner and Admin will get the commission fo');
			$table->enum('driver_tracking', array('N','S'))->default('N');
			$table->string('package_status', 3)->default('A');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('package');
	}

}
