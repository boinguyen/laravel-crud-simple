<?php

namespace App\Modules\Web\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Business\Repository\AccountRepository as AcountRes;

class AccountController extends Controllers {

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
        echo "<pre>";
        print_r(__FUNCTION__);
        echo "</pre>";
        exit;
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
                ->withErrors($result['result'])
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

    public function profile(){
        $user = $this->account->profile();

        return view('Web::account.profile', compact('user'));
    }

    public function profileUpdate(){
        $user = $this->account->profile();

        return view('Web::account.profile-update', compact('user'));
    }

    public function profileUpdatePost(Request $request){
        $input = $request->all();
        $id = \Auth::user()->id;
        $result = $this->account->update($input, $id);

        if( $result['success'] ){
            //: Add flash session
            return redirect('/account/profile/');
        }
        else{
            echo "<pre>";
            print_r('fail');
            echo "</pre>";
            exit;
        }
    }

}
