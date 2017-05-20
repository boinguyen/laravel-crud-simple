<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    public static $role_admin = 'admin';
    public static $role_user = 'user';
    public static $status_waiting = 'waiting';
    public static $status_active = 'active';
    public static $status_block= 'block';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'f_name', 'l_name', 'role', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $rules = array(
        'email' => 'required|email|unique:users|min:5|max:50',
        'password' => 'required|min:3|confirmed',
        'password_confirmation' => 'required',
        'f_name' => 'required',
        'l_name' => 'required',
    );

    private $messages = array(
        'f_name.required' => 'The first name field is required.',
        'l_name.required' => 'The last name field is required.'
    );

    public function valid($input = array()){
        return \Validator::make($input, $this->rules, $this->messages);
    }

    public function isAdmin()
    {
        return $this->role ==='admin' ? true : false; // this looks for an admin column in your users table
    }

    public function isUser()
    {
        return $this->role ==='user' ? true : false; // this looks for an admin column in your users table
    }

}
