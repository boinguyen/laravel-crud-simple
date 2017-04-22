<?php

namespace App\Library;

class UtilHelper {
    //put your code here

    public static function enumToString($enum_str = ''){
        $str = '';
        if( !empty($enum_str) ){
            //: Remove _ from enum value
            $str = str_replace('_', ' ', $enum_str);
            //: ucwords
            $str = ucwords($str);
        }

        return $str;
    }

    /**
     *
     * @param array $data
     * $data[success] boolean
     * $data[message] string
     * @return void
     */
    public static function flashSession( array $data ){
        $flash_message = array(
            'success' => $data['success'],
            'message' => $data['message'],
            'class' => 'alert-success',
        );

        if( !$data['success'] ){
            $flash_message['class'] = 'alert-warning';
        }

        \Session::flash('flashMessage', $flash_message);
    }

    public static function encrypt($str){
        return \Hash::make($str);
    }
}
