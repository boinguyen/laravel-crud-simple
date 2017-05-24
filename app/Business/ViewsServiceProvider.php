<?php

namespace App\Business;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

/**
 * ServiceProvider
 *
 * The service provider for the modules. After being registered
 * it will make sure that each of the modules are properly loaded
 * i.e. with their routes, views etc.
 *
 * @author Kamran Ahmed <kamranahmed.se@gmail.com>
 * @package App\Modules
 */
class ViewsServiceProvider extends ServiceProvider {

    public function boot() {

        //\View::share('user', \Auth::user());
        view()->composer('Admin::layouts.*', function ($view) {
            $view->with('user', auth()->user());
        });
        view()->composer('Web::layouts.*', function ($view) {
            $view->with('user', auth()->user());
        });
    }

    public function register() {

    }

}
