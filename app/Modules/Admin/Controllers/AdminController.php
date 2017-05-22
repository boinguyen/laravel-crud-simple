<?php

namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Business\Repository\AccountRepository as Admin;

class AdminController extends Controller {

    protected $admin;

    public function __construct(Admin $admin) {
        $this->admin =$admin;
    }

    public function dashboard(){
        $user = \Auth::user();
        return view('Admin::dashboard', compact('user'));
    }

    public function login() {

        if( \Auth::user() ){
            return redirect('admin/dashboard');
        }
        return view('Admin::login');
    }

    public function loginPost(Request $request){
        $input = $request->all();
        $input['role'] = 'admin';

        $auth = $this->admin->login($input);

        if( $auth['success'] ){
            return redirect('/admin');
        }
        else{
            return redirect('/admin/login');
        }
    }

}
