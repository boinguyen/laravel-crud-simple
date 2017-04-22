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
                        'result' => $userM
                    );
                }
                else{
                    $result = array(
                        'success' => false,
                        'message' => 'Error',
                        'result' => null
                    );
                }
            }
            else{
                $result = array(
                    'success' => false,
                    'message' => 'Error',
                    'result' => $valid
                );
            }

        } catch(Exception $ex) {

        }

        return $result;
    }

    public function delete($id) {

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
                    'result' => \Auth::user()
                );
            }
            else{
                $result = array(
                    'success' => false,
                    'message' => 'Login fail',
                    'result' => null
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
            'result' => null
        );
    }

    public function profile(){
        return \Auth::user();
    }

}
