<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderAndIcon extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('news', function($table)
		{
    		$table->string('icon')->after('content');
		});

		Schema::table('issues', function($table)
		{
    		$table->string('icon')->after('title');
		});

		Schema::table('politicians', function($table)
		{
    		$table->string('icon')->after('name');
		});

		Schema::table('districts', function($table)
		{
    		$table->integer('order')->unsigned()->after('description');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('news', function($table) {
			$table->dropColumn("icon");
		});
		Schema::table('issues', function($table) {
			$table->dropColumn("icon");
		});
		Schema::table('politicians', function($table) {
			$table->dropColumn("icon");
		});
		Schema::table('districts', function($table) {
			$table->dropColumn("order");
		});
	}

}
