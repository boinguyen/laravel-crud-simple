<?php

namespace App\Modules\Admin\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Business\Repository\AccountRepository as AccountRes;
//use Yajra\Datatables\Facades\Datatables;
use App\Models\User;
use App\Http\Controllers\BaseController;
use App\Business\ResourceInterface;
use App\Library\UtilHelper;

class AccountController extends BaseController implements ResourceInterface{

    protected $account;

    public function __construct(AccountRes $accountRes) {
        $this->account = $accountRes;
        //parent::__construct();
    }

    public function index(){
        return view('Admin::account.index');
    }

    public function getList(){
        $lists = $this->account->getUserList();

        return \Datatables::of($lists)
            ->addColumn('actions', 'Admin::account._datatables.actions')
            ->rawColumns(['actions'])
            ->make(true);

    }

    public function create() {

    }

    public function edit($id) {

    }

    public function show($id) {

    }

    public function store(Request $request) {

    }

    public function update(Request $request, $id) {

    }

    public function destroy($id) {
        $result = $this->account->delete($id);

        UtilHelper::flashSession($result);
    }

}
