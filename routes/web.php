<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api'], function() {
	// auth
	Route::post('register', 'UserController@register');
	Route::post('login', 'UserController@login');

	// get budget
	Route::get('budget', 'BudgetController@get');

	// thread
	Route::post('thread', 'ThreadController@create');
	Route::post('thread/edit', 'ThreadController@edit');
	Route::post('thread/delete', 'ThreadController@delete');
	
	Route::get('thread/user/{id}', 'ThreadController@getAllByUser');
	Route::get('thread/tutor/{id}', 'ThreadController@getAllExceptUser');
	Route::get('thread/{id}', 'ThreadController@detail');

	// become tutor
	Route::post('tutor/new', 'TutorController@becomeTutor');
	Route::post('tutor/edit', 'TutorController@editSkill');
	Route::get('tutor/{id}', 'TutorController@getProfile');
});
