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

    public function lists(){
        $account_list = User::all();
        echo "<pre>";
        print_r($account_list);
        echo "</pre>";
        exit;
    }


}
