<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table('users', function($table)
		{
    		
    		$table->string('intro')->after('name');
	        $table->string('avatar_url')->after('name');

		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table)
		{
		    $table->dropColumn('intro', 'avatar_url');
		});
	}

}
