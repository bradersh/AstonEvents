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

Route::get('/', 'IndexController@display');

Route::get('/view', 'IndexController@view');

Route::get('loggedIn', function () {
    return 'loggedIn';
});

Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');

Auth::routes();

Route::resource('api/users', 'UserController');

Route::get('events', 'EventsController@index')->name('events.index');
Route::post('events', 'EventsController@addEvent')->name('events.add');
