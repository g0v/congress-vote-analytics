<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewsPoliticianRecords extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news_politician_records', function($table)
	    {
	        $table->increments('id')->unsigned();
	        $table->integer('news_id')->unsigned();
	        $table->integer('politician_id')->unsigned();
			$table->integer('creator_id')->unsigned();
	        $table->timestamps();

	        $table->foreign('news_id')
    			  ->references('id')->on('news')
    			  ->onDelete('cascade')->onUpdate('cascade');

	        $table->foreign('politician_id')
    			  ->references('id')->on('issues')
    			  ->onDelete('cascade')->onUpdate('cascade');

    		$table->foreign('creator_id')
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
		Schema::drop('news_politician_records');
	}

}
