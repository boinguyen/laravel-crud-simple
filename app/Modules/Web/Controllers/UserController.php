<?php

namespace App\Modules\Web\Controllers;

use App\Modules\Web\Controllers\Controller;
use Illuminate\Http\Request;
use App\Business\Repository\AccountRepository as User;

class UserController extends Controller {

    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
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
        $result = $this->user->store($input);

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
        //
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
        $auth = $this->user->login($input);

        if( $auth['success'] ){
            return redirect()->intended('/account');
        }
        else{
            return redirect('/login');
        }
    }

}
