<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PoliticianIssueScoreRecords extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('politician_issue_score_records', function($table)
	    {
	        $table->increments('id')->unsigned();
	        $table->integer('politician_id')->unsigned();
	        $table->integer('issue_id')->unsigned();
	        $table->integer('score');
			$table->integer('score_by_user_id')->unsigned();
	        $table->timestamps();

	        $table->foreign('politician_id')
    			  ->references('id')->on('politicians')
    			  ->onDelete('cascade')->onUpdate('cascade');

	        $table->foreign('issue_id')
    			  ->references('id')->on('issues')
    			  ->onDelete('cascade')->onUpdate('cascade');

    		$table->foreign('score_by_user_id')
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
		Schema::drop('politician_issue_score_records');
	}

}
