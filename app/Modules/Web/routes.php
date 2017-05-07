<?php

//use Illuminate\Http\Request;

Route::group(['middleware' => ['web'], 'namespace' => 'App\Modules\Web\Controllers', 'module' => 'Web'], function() {
    Route::get('/register', array('uses' => 'UserController@register'));
    Route::post('/register', array('uses' => 'UserController@store'));
    Route::get('/login', array('as' => 'login', 'uses' => 'UserController@login'));
    Route::post('/login', array('uses' => 'UserController@loginPost'));

    //: Auth
    Route::group( array('middleware' => array('user'), 'prefix' => 'account' ), function() {
        Route::resource('account', 'AccountController');

        //: Profile
        Route::get('/', array('uses' => 'AccountController@dashboard'));
        Route::get('/dashboard', array('uses' => 'AccountController@dashboard'));
        Route::get('/profile', array('uses' => 'AccountController@profile'));
        Route::get('/profile/update', array('uses' => 'AccountController@profileUpdate'));
        Route::post('/profile/update', array('uses' => 'AccountController@profileUpdatePost'));

        //: Logout
        Route::get('/logout', array('uses' => 'AccountController@logout'));
    });

});
