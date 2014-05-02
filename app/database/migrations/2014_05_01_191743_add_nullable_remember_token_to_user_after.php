<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableRememberTokenToUserAfter extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::table('users', function($table) {
			$table->dropColumn("remember_token");
		});

		Schema::table('users', function($table) {
			$table->text("remember_token")->nullable()->after('intro');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table) {
			$table->dropColumn("remember_token");
		});
	}

}
