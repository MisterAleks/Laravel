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

Route::get('/main', 'PagesController@main');

Route::group(['prefix' => 'admin'], function()
{
	Route::get('', 'AdminController@index');

	Route::get('/refreshUser', 'AdminController@refreshUser');

	Route::get('/refreshRole', 'AdminController@refreshRole');

	Route::get('/refreshDepartment', 'AdminController@refreshDepartment');

	Route::get('/refreshGroup', 'AdminController@refreshGroup');

	Route::post('/saveUser', 'AdminController@saveUser');
	
	Route::get('/deleteUser/{id}', 'AdminController@deleteUser');
});

Route::group(['prefix' => 'teacher'], function()
{
	Route::get('', 'TeacherController@index');
});