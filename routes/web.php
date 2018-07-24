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
    //Operating Systems Routes
	Route::get(
	    '/os',
	    [
	        'as' => 'admin.os.index',
	        'uses' => 'OperatigSystemController@index',
	    ]
	);
    Route::get(
        '/os/create',
        [
            'as' => 'admin.os.create',
            'uses' => 'OperatigSystemController@create',
        ]
    );
    Route::post(
        '/os/store',
        [
            'as'    => 'admin.os.store',
            'uses'  => 'OperatigSystemController@store',
        ]
    );
    Route::get(
        '/os/edit/{id}',
        [
            'as'    => 'admin.os.edit',
            'uses'  => 'OperatigSystemController@edit',
        ]
    );
    Route::post(
        '/os/update/{id}',
        [
            'as'    => 'admin.os.update',
            'uses'  => 'OperatigSystemController@update',
        ]
    );
    Route::get(
        '/os/destroy/{id}',
        [
            'as'    => 'admin.os.destroy',
            'uses'  => 'OperatigSystemController@destroy',
        ]
    );

    //Features Routes
    Route::get(
        '/feature',
        [
            'as' => 'admin.feature.index',
            'uses' => 'FeatureController@index',
        ]
    );
    Route::get(
        '/os/create',
        [
            'as' => 'admin.feature.create',
            'uses' => 'FeatureController@create',
        ]
    );
    Route::post(
        '/os/store',
        [
            'as'    => 'admin.feature.store',
            'uses'  => 'FeatureController@store',
        ]
    );
    Route::get(
        '/os/edit/{id}',
        [
            'as'    => 'admin.feature.edit',
            'uses'  => 'FeatureController@edit',
        ]
    );
    Route::post(
        '/os/update/{id}',
        [
            'as'    => 'admin.feature.update',
            'uses'  => 'FeatureController@update',
        ]
    );
    Route::get(
        '/os/destroy/{id}',
        [
            'as'    => 'admin.feature.destroy',
            'uses'  => 'FeatureController@destroy',
        ]
    );
 });


Auth::routes();

