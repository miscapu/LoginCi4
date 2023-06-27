<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        helper( [ 'form' ] );

        $data   =   [
            'title'     =>  'Login'
        ];

        $renderT    =   \Config\Services::renderer();

        return $renderT->setData( $data )->render( 'Pages/Login' );
    }

    public function registerUser()
    {
        helper( [ 'form' ] );

        $data   =   [
            'title'     =>  'Register User'
        ];

        if ( $this->request->getMethod() == 'post' ){
            $rules  =   [
                'nameFrm'       =>  'required|min_length[3]|max_length[120]',
                'emailFrm'      =>  'required|min_length[10]|max_length[255]|valid_email|is_unique[users.email]',
                'pwdFrm'        =>  'required|min_length[3]|max_length[100]',
                'cfPwdFrm'      =>  'matches[pwdFrm]'
            ];

            $messages   =   [
                'nameFrm'       =>  [
                    'required'      =>  'The name is required!',
                    'min_length'    =>  'The name must have 3 characters min',
                    'max_length'    =>  'The name must have 120 max'
                ],

                'emailFrm'       =>  [
                    'required'      =>  'The email is required!',
                    'min_length'    =>  'The email must have 10 characters min',
                    'max_length'    =>  'The email must have 255 max',
                    'valid_email'   =>  'The email must be correct!',
                    'is_unique'     =>  'The email exist already',
                ],

                'pwdFrm'       =>  [
                    'required'      =>  'The password is required!',
                    'min_length'    =>  'The password must have 3 characters min',
                    'max_length'    =>  'The password must have 100 max',
                ],

                'cfPwdFrm'       =>  [
                    'matches'       =>  'The password must be equal to password',
                ]
            ];

            if ( ! $this->validate( $rules, $messages ) ){
                $data[ 'validation' ]   =   $this->validator;
            }else{
                echo "OK";
            }

        }

        $renderT    =   \Config\Services::renderer();

        return $renderT->setData( $data )->render( 'Pages/Register' );
    }


}
