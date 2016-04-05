<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});


Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

Route::resource('roles','RolesController');
Route::get('roles/{roles}/destroy','RolesController@destroy')->name('admin.roles.destroy');

Route::get('roles/rolespermisos/{roles}',
	'RolesController@rolespermisos')->name('admin.roles.rolespermisos');

});





Route::get('login','Auth\AuthController@getLogin')->name('login');
Route::post('login','Auth\AuthController@postLogin')->name('login');

Route::get('logout','Auth\AuthController@getLogout')->name('logout');





















