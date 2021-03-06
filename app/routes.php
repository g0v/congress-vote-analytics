<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@getIndexPage');

Route::get('/login', 'HomeController@getLoginPage');

Route::get('/logout', 'HomeController@getLogoutPage');

Route::get('/get-login-form', 'HomeController@getLoginForm');

Route::get('/issue', 'IssueController@getIssuePage');

Route::get('/issue/get-add-issue-form', 'IssueController@getAddIssueForm');

Route::get('/issue/{id}', 'IssueController@showIssue');

Route::get('/issue/{id}/news', 'IssueController@showIssueNews');

Route::post('/issue/add-issue', 'IssueController@addIssue');

Route::get('/politician', 'PoliticianController@getPoliticianPage');

Route::get('/politician/get-add-politician-form', 'PoliticianController@getAddPoliticianForm');

Route::post('/politician/add-politician', 'PoliticianController@addPolitician');

Route::get('/politician/{id}', 'PoliticianController@showPolitician');

Route::get('/politician/{id}/news', 'PoliticianController@showPoliticianNews');

Route::get('/news', 'NewsController@getNewsPage');

Route::get('/news/get-add-news-form', 'NewsController@getAddNewsForm');

Route::post('/news/add-news', 'NewsController@addNews');

Route::get('/news/get-tag-news-form', 'NewsController@getTagNewsForm');

Route::post('/news/tag-news', 'NewsController@tagNews');

Route::get('/district', 'HomeController@getDistrictPage');

Route::get('/me/profile', 'MeController@getMeProfilePage');

Route::get('/me/issue-score', 'MeController@getMeIssueScorePage');

Route::post('/me/update-profile', 'MeController@postUpdateProfile');

Route::post('/me/update-issue-score', 'MeController@postUpdateIssueScore');

Route::post('/me/update-politician-issue-score', 'MeController@postUpdatePoliticianIssueScore');

Route::get('/api/search/issue', 'APIController@searchIssue');

Route::get('/api/search/politician', 'APIController@searchPolitician');
