<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserFacebookAccounts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create('user_facebook_accounts', function($table)
	    {
	        
	        $table->increments('id');
	        $table->string('facebook_id')->unique();
	        $table->string('user_id');
	        $table->timestamps();

	    });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_facebook_accounts');
	}

}
