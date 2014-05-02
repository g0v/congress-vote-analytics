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

Route::get('/issue', 'HomeController@getIssuePage');

Route::get('/politician', 'HomeController@getPoliticianPage');

Route::get('/news', 'HomeController@getNewsPage');

Route::get('/district', 'HomeController@getDistrictPage');

Route::get('/me/profile', 'MeController@getMeProfilePage');

Route::post('/me/update-profile', 'MeController@postUpdateProfile');