<?php

namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Business\Repository\AccountRepository as Admin;

class DashboardController extends Controller {

    protected $admin;

    public function __construct(Admin $admin) {
        $this->admin =$admin;
    }

    public function dashboard(){
        return view('Admin::dashboard.dashboard');
    }

}
