<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Politicians extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('politicians', function($table)
	    {
	        $table->increments('id')->unsigned();
	        $table->string('name');
	        $table->integer('district_id')->unsigned();
			$table->integer('creator_id')->unsigned();
	        $table->timestamps();

	        $table->foreign('district_id')
    			  ->references('id')->on('districts')
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
		Schema::drop('politicians');
	}

}
