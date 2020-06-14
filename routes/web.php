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

// Begin::backend route
// Admin
Route::group(['prefix'=>'admin', 'namespace'=>'Backend', 'as'=>'back.'], function(){
	// Auth route
	
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
