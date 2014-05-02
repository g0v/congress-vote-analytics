<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class News extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function($table)
	    {
	        $table->increments('id')->unsigned();
	        $table->string('url')->unique();
	        $table->string('title');
			$table->text('content');
			$table->integer('creator_id')->unsigned();
	        $table->timestamps();

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
		Schema::drop('news');
	}

}
