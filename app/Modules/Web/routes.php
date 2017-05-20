<?php

//use Illuminate\Http\Request;

Route::group(['middleware' => ['web'], 'namespace' => 'App\Modules\Web\Controllers', 'module' => 'Web'], function() {
    //: Sign up
    Route::get('/register', array('uses' => 'AccountController@register'));
    Route::post('/register', array('uses' => 'AccountController@store'));

    //: Login
    Route::get('/login', array('as' => 'login', 'uses' => 'AccountController@login'));
    Route::post('/login', array('uses' => 'AccountController@loginPost'));

    //: Auth
    Route::group( array('middleware' => ['user'] ), function() {
        //: Account
        Route::resource('account', 'AccountController');

        //: Logout
        Route::get('/logout', array('uses' => 'AccountController@logout'));
    });

});
