<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('code_id');
			$table->string('username');
			$table->string('email')->unique();
			$table->string('password');
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->text('permissions')->nullable();
			$table->tinyInteger('activated')->default('0');
			$table->string('activation_code')->nullable();
			$table->timestamp('activated_at')->nullable();
			$table->timestamp('last_login')->nullable();
			$table->string('persist_code')->nullable();
			$table->string('reset_password_code')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}