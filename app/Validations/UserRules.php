<?php
namespace App\Validations;

use App\Models\User;

class UserRules
{
    /**
     * @param $str: the value to validate
     * @param string $fields: the parameter string
     * @param array $data: array with all of the data that was submitted the form
     * @return bool
     */
    public function validateUser( $str, string $fields, array $data ):bool
    {
        $userModel  =   new User();
        $user       =   $userModel->where( 'email', $data[ 'emailFrm' ] )->first();

        if ( !$user ):
            return false;
        endif;


        return password_verify( $data[ 'pwdFrm' ], $user[ 'password' ] ); #true or false
    }
}