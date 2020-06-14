<?php

use Illuminate\Support\Facades\Route;



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

    return redirect()->route('dashboard');
    return view('welcome');
});




Route::get('dashboard', [
    'uses' => 'Backend\DashboardController@showDashboard',
    'as' => 'dashboard',
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin', 'namespace'=>'Backend', 'as'=>'backend.', 'middleware'=>'auth'], function(){
	Route::get('/', 'DashboardController@showDashboard')->name('dashboard');

	// Users and role management
	Route::group(['prefix'=>'users', 'as'=>'users.'], function(){
		Route::get('roles', 'UserController@viewRoleList')->name('roles');
	});
});