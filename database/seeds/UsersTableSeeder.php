<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Library\UtilHelper;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            array(
                'email' => 'admin@admin.com',
                'password' => UtilHelper::encrypt('admin'),
                'f_name' => 'Admin',
                'l_name' => 'Admin',
                'activation_code' => null,
                'remember_token' => null,
                'role' => User::$role_admin,
                'status' => User::$status_active,
            )
        );

        foreach( $users as $user ){
            $userM = new User();
            $userM->fill($user);
            $userM->save();
        }
    }
}
