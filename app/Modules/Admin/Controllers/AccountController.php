<?php

namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use App\Business\Repository\AccountRepository as Account;
use Yajra\Datatables\Facades\Datatables;
use App\Models\User;

class AccountController extends Controller{

    protected $account;

    public function __construct(Account $account) {
        $this->account = $account;
    }

    public function index(){
        return view('Admin::account.lists');
    }

    public function getList(){
        $cols = array(
            'id',
            'email',
            'CONCAT(f_name, " ", l_name) as full_name',
            'role',
            'status'
        );
        $lists = User::all();

        return \Datatables::of($lists)
            ->make();
    }


}
