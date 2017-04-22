<?php

namespace App\Modules\Web\Controllers;

use App\Modules\Web\Controllers\Controller;
use Illuminate\Http\Request;
use App\Business\Repository\AccountRepository as Acount;

class AccountController extends Controller {

    private $_account;

    public function __construct(Acount $account) {
        $this->_account = $account;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
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
        $result = $this->_account->store($input);

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

    public function logout(){
        $this->_account->logout();

        return redirect('/');
    }

    public function profile(){
        $user = $this->_account->profile();

        return view('Web::account.profile', compact('user'));
    }

    public function profileUpdate(){
        $user = $this->_account->profile();

        return view('Web::account.profile-update', compact('user'));
    }

    public function profileUpdatePost(Request $request){
        $input = $request->all();
        $id = \Auth::user()->id;
        $result = $this->_account->update($input, $id);

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
