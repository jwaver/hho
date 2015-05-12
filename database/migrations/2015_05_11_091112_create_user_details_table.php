<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserDetailsTable extends Migration {

	public function up()
	{
		Schema::create('user_details', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('level')->nullable();
			$table->string('package_type')->nullable();
			$table->string('referrer_id')->nullable();
			$table->timestamp('birth_date')->nullable();
			$table->string('gender')->nullable();
			$table->string('marital_status')->nullable();
			$table->string('citizenship')->nullable();
			$table->text('phone')->nullable();
			$table->text('address')->nullable();
			$table->text('zip')->nullable();
			$table->string('vehicle')->nullable();
			$table->text('notes')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('user_details');
	}
}