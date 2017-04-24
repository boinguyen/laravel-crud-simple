<?php

Route::group( array( 'middleware' => ['web'], 'namespace' => 'App\Modules\Admin\Controllers', 'module' => 'Admin', 'prefix' => 'admin' ), function() {
    Route::get('/login', array('uses' => 'AdminController@login'));
    Route::post('/login', array('uses' => 'AdminController@loginPost'));

    Route::group( array('middleware' => ['admin'] ), function() {
        Route::get('/', array('uses' => 'DashboardController@dashboard'));
        //Route::resource('account', 'AccountController');
        //: Account
        Route::get('/account/index', array('uses' => 'AccountController@index'));
        Route::get('/account/getList', array('uses' => 'AccountController@getList'));
    });
});
