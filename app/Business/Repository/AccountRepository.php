<?php
namespace App\Business\Repository;

use App\Business\RepositoryAbstract;
use App\Models\User;
use App\Library\UtilHelper;

/**
 * Description of AccountRepository
 *
 * @author thanh
 */
class AccountRepository extends RepositoryAbstract{
    //put your code here

    public function model() {
        return 'App\Models\User';
    }

    public function all($columns = array()) {

    }

    public function store(array $data) {
        //$this->model;
        $result = array();
        try {
            $userM = new User();

            $data['password'] = $data['password'];
            $data['role'] = $userM::$role_user;
            $data['status'] = $userM::$status_waiting;

            $valid = $userM->valid($data);
            if( $valid->passes() ){
                $data['password'] = UtilHelper::encrypt($data['password']);
                $userM->fill($data);

                if( $userM->save() ){
                    //: Send mail active

                    //: Message success
                    $result = array(
                        'success' => true,
                        'message' => 'Register successfully',
                        'data' => $userM
                    );
                }
                else{
                    $result = array(
                        'success' => false,
                        'message' => 'Error',
                        'data' => null
                    );
                }
            }
            else{
                $result = array(
                    'success' => false,
                    'message' => 'Error',
                    'data' => $valid
                );
            }

        } catch(Exception $ex) {

        }

        return $result;
    }

    public function delete($id) {
        $user = User::find($id);
        $user->deleted_at = date('Y-m-d H:i:s');
        $user->save();

        $data = [
            'success' => true,
            'message' => 'Delete user successfully',
            'data' => $user
        ];

        return $data;
    }

    public function find($id, $columns = array()) {

    }

    public function findBy($field, $value, $columns = array()) {

    }

    public function paginate($perPage = 10, $columns = array()) {

    }

    public function update(array $data, $id) {
        $result = array(
            'success' => false,
            'message' => 'Update user successfully',
            'data' => null
        );
        $user = User::find($id);
        $user->f_name = $data['f_name'];
        $user->l_name = $data['l_name'];

        if( $user->save() ){
            $result = array(
                'success' => true,
                'message' => 'Update user successfully',
                'data' => $user
            );
        }

        UtilHelper::flashSession($result);

        return $result;

    }

    public function login($data){

        $credentials = array(
            'email' => $data['email'],
            'password' => $data['password'],
            'status' => 'active'
        );

        //: Check admin
        if( array_key_exists('role', $data) ){
            $credentials['role'] = $data['role'];
        }

        //: Remember
        $remember = false;
        if( array_key_exists('remember', $data) && $data['remember'] ==1 ){
            $remember = true;
        }

        try {
            $auth = \Auth::attempt( $credentials, $remember );

            if( $auth ){
                $result = array(
                    'success' => true,
                    'message' => 'Login successfully',
                    'data' => \Auth::user()
                );
            }
            else{
                $result = array(
                    'success' => false,
                    'message' => 'Login fail',
                    'data' => null
                );
            }
        } catch(Exception $ex) {
            \Log::error($ex->getMessage());
        }

        return $result;

    }

    public function logout(){
        \Auth::logout();

        return array(
            'success' => true,
            'message' => 'Logout successfully!',
            'data' => null
        );
    }

    public function profile(){
        return \Auth::user();
    }

    public function getUserList(){
        $cols = array(
            'id',
            'email',
            \DB::raw('CONCAT(f_name, " ", l_name) as full_name'),
            'role',
            'status'
        );

        $users = User::select($cols)
            //->where('id', '<>', \Auth::id())
            //->where('role', '<>', User::$role_admin)
            ->whereNull('deleted_at')
            ->get();

        return $users;
    }

}
