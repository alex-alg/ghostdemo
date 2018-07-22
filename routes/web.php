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

Route::get(
    '/',
    [
        'as' => 'index',
        'uses' => 'HomeController@index',
    ]
);

Route::get(
    '/home',
    [
        'as' => 'home',
        'uses' => 'HomeController@index',
    ]
);

Route::get(
    '/pricing',
    [
        'as' => 'pricing',
        'uses' => 'PricingPlansController@index',
    ]
);

 Route::group(['prefix' => 'admin'], function () {
 	Route::get(
	    '/',
	    [
	        'as' => 'admin.index',
	        'uses' => 'AdminController@index',
	    ]
	);
	Route::get(
	    '/os',
	    [
	        'as' => 'admin.os.index',
	        'uses' => 'OsController@index',
	    ]
	);
 });


Auth::routes();

