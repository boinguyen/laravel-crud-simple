<?php

Route::group( array( 'middleware' => ['web'], 'namespace' => 'App\Modules\Admin\Controllers', 'module' => 'Admin', 'prefix' => 'admin' ), function() {
    Route::get('/login', array('uses' => 'AdminController@login'));
    Route::post('/login', array('uses' => 'AdminController@loginPost'));

    Route::group( array('middleware' => ['admin'] ), function() {
        Route::get('/', array('uses' => 'DashboardController@dashboard'));
        //Route::resource('account', 'AccountController');
        Route::get('/account/lists', array('uses' => 'AccountController@lists'));
    });
});
