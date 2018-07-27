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
    '/plan-list',
    [
        'as' => 'plan-list',
        'uses' => 'PlanController@planList',
    ]
);

Route::get(
    '/set-cookie-values/source/{source}/campaign/{campaign}/voucher_code/{voucher_code?}',
    [
        'as'    => 'home.set-cookie-values',
        'uses'  => 'HomeController@setCookieValues',
    ]
);

Route::post(
    '/voucher/apply',
    [
        'as'    => 'voucher.apply',
        'uses'  => 'VoucherController@applyVoucher',
    ]
);

 Route::group(['prefix' => 'admin', 'middleware' => ['is_admin_user']], function () {
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
	        'uses' => 'OperatigSystemController@index'
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
        '/os/edit/{os}',
        [
            'as'    => 'admin.os.edit',
            'uses'  => 'OperatigSystemController@edit',
        ]
    );
    Route::post(
        '/os/update/{os}',
        [
            'as'    => 'admin.os.update',
            'uses'  => 'OperatigSystemController@update',
        ]
    );
    Route::get(
        '/os/destroy/{os}',
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
        '/feature/edit/{feature}',
        [
            'as'    => 'admin.feature.edit',
            'uses'  => 'FeatureController@edit',
        ]
    );
    Route::post(
        '/feature/update/{feature}',
        [
            'as'    => 'admin.feature.update',
            'uses'  => 'FeatureController@update',
        ]
    );
    Route::get(
        '/feature/destroy/{feature}',
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
        '/voucher/edit/{voucher}',
        [
            'as'    => 'admin.voucher.edit',
            'uses'  => 'VoucherController@edit',
        ]
    );
    Route::post(
        '/voucher/update/{voucher}',
        [
            'as'    => 'admin.voucher.update',
            'uses'  => 'VoucherController@update',
        ]
    );
    Route::get(
        '/voucher/destroy/{voucher}',
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
        '/plan/edit/{plan}',
        [
            'as'    => 'admin.plan.edit',
            'uses'  => 'PlanController@edit',
        ]
    );
    Route::post(
        '/plan/update/{plan}',
        [
            'as'    => 'admin.plan.update',
            'uses'  => 'PlanController@update',
        ]
    );
    Route::get(
        '/plan/destroy/{plan}',
        [
            'as'    => 'admin.plan.destroy',
            'uses'  => 'PlanController@destroy',
        ]
    );
 });


Auth::routes();

