<?php

namespace App\Modules\Web\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Business\Repository\AccountRepository as AcountRes;
use App\Business\ResourceInterface;

class AccountController extends BaseController implements ResourceInterface {

    protected $account;

    public function __construct(AcountRes $accountRes) {
        $this->account = $accountRes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user = \Auth::user();

        return view('Web::account.dashboard', compact('user'));
    }

    function dashboard(){
        return view('Web::account.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('Web::account.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $input = $request->all();
        $result = $this->account->store($input);

        if( $result['success'] ){
            return redirect('/login');
        }
        else{
            return redirect('/register')
                ->withErrors($result['data'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $input = $request->all();
        echo "<pre>";
        print_r($input);
        echo "</pre>";
        exit;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function register() {
        return view('Web::account.register');
    }

    public function login() {
        if( \Auth::user() ){
            return redirect('/account');
        }
        return view('Web::account.login');
    }

    public function loginPost(Request $request){
        $input = $request->all();

        //: Remember
        if( array_key_exists('remember', $input) && $input['remember'] ==1 ){
            $input['remember'] = true;
        }
        $auth = $this->account->login($input);

        if( $auth['success'] ){
            return redirect()->intended('/account');
        }
        else{
            return redirect('/login');
        }
    }

    public function logout(){
        $this->account->logout();

        return redirect('/');
    }

}
