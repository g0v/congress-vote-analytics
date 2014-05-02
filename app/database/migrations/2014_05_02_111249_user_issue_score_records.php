<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserIssueScoreRecords extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_issue_score_records', function($table)
	    {
	        $table->increments('id')->unsigned();
	        $table->integer('user_id')->unsigned();
	        $table->integer('issue_id')->unsigned();
	        $table->integer('score');
	        $table->timestamps();

	        $table->foreign('user_id')
    			  ->references('id')->on('users')
    			  ->onDelete('cascade')->onUpdate('cascade');

	        $table->foreign('issue_id')
    			  ->references('id')->on('issues')
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
		Schema::drop('user_issue_score_records');
	}

}
