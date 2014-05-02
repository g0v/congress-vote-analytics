<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAddUserFacebookAccountsForeignKey extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		DB::statement('ALTER TABLE user_facebook_accounts MODIFY COLUMN user_id int unsigned');

		Schema::table('user_facebook_accounts', function($table)
		{

    		$table->foreign('user_id')
    			  ->references('id')->on('users')
    			  ->onDelete('cascade')->onUpdate('cascade');

		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

		Schema::table('user_facebook_accounts', function($table)
		{

    		$table->dropForeign('user_id');

		});

	}

}
