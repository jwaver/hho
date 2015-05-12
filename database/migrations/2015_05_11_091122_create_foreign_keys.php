<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('socials', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('user_details', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('throttle', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('no action');
		});
	}

	public function down()
	{
		Schema::table('socials', function(Blueprint $table) {
			$table->dropForeign('socials_user_id_foreign');
		});
		Schema::table('user_details', function(Blueprint $table) {
			$table->dropForeign('user_details_user_id_foreign');
		});
		Schema::table('throttle', function(Blueprint $table) {
			$table->dropForeign('throttle_user_id_foreign');
		});
	}
}