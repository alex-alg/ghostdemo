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
        '/feature/create',
        [
            'as' => 'admin.feature.create',
            'uses' => 'FeatureController@create',
        ]
    );
    Route::post(
        '/feature/store',
        [
            'as'    => 'admin.feature.store',
            'uses'  => 'FeatureController@store',
        ]
    );
    Route::get(
        '/feature/edit/{id}',
        [
            'as'    => 'admin.feature.edit',
            'uses'  => 'FeatureController@edit',
        ]
    );
    Route::post(
        '/feature/update/{id}',
        [
            'as'    => 'admin.feature.update',
            'uses'  => 'FeatureController@update',
        ]
    );
    Route::get(
        '/feature/destroy/{id}',
        [
            'as'    => 'admin.feature.destroy',
            'uses'  => 'FeatureController@destroy',
        ]
    );

    //Voucher Routes
    Route::get(
        '/voucher',
        [
            'as' => 'admin.voucher.index',
            'uses' => 'VoucherController@index',
        ]
    );
    Route::get(
        '/voucher/create',
        [
            'as' => 'admin.voucher.create',
            'uses' => 'VoucherController@create',
        ]
    );
    Route::post(
        '/voucher/store',
        [
            'as'    => 'admin.voucher.store',
            'uses'  => 'VoucherController@store',
        ]
    );
    Route::get(
        '/voucher/edit/{id}',
        [
            'as'    => 'admin.voucher.edit',
            'uses'  => 'VoucherController@edit',
        ]
    );
    Route::post(
        '/voucher/update/{id}',
        [
            'as'    => 'admin.voucher.update',
            'uses'  => 'VoucherController@update',
        ]
    );
    Route::get(
        '/voucher/destroy/{id}',
        [
            'as'    => 'admin.voucher.destroy',
            'uses'  => 'VoucherController@destroy',
        ]
    );

    //Plans Routes
    Route::get(
        '/plan',
        [
            'as' => 'admin.plan.index',
            'uses' => 'PlanController@index',
        ]
    );
    Route::get(
        '/plan/create',
        [
            'as' => 'admin.plan.create',
            'uses' => 'PlanController@create',
        ]
    );
    Route::post(
        '/plan/store',
        [
            'as'    => 'admin.plan.store',
            'uses'  => 'PlanController@store',
        ]
    );
    Route::get(
        '/plan/edit/{id}',
        [
            'as'    => 'admin.plan.edit',
            'uses'  => 'PlanController@edit',
        ]
    );
    Route::post(
        '/plan/update/{id}',
        [
            'as'    => 'admin.plan.update',
            'uses'  => 'PlanController@update',
        ]
    );
    Route::get(
        '/plan/destroy/{id}',
        [
            'as'    => 'admin.plan.destroy',
            'uses'  => 'PlanController@destroy',
        ]
    );
 });


Auth::routes();

