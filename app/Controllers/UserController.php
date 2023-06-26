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
                'cfPwdFrm'      =>  'required|matches[pwdFrm]'
            ];
            if ( ! $this->validate( $rules ) ){
                $data[ 'validation' ]   =   $this->validator;
            }else{
                echo "OK";
            }

        }

        $renderT    =   \Config\Services::renderer();

        return $renderT->setData( $data )->render( 'Pages/Register' );
    }


}
