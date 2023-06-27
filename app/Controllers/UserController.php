<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use \ReflectionException;

class UserController extends BaseController
{
    public function index()
    {
        helper( [ 'form' ] );

        $data   =   [
            'title'     =>  'Login'
        ];

        if ( $this->request->getMethod() == 'post'  ){
            $rules      =   [
                'emailFrm'      =>  'required|min_length[10]|valid_email',
                'pwdFrm'        =>  'required|min_length[3]|validateUser[emailFrm,pwdFrm]'
            ];
            $messages   =   [
                'emailFrm'      =>  [
                    'required'      =>  'Email is required!',
                    'min_length'    =>  'Email must have more than 3 characters',
                    'valid_email'   =>  'Email must be valid'
                ],
                'pwdFrm'      =>  [
                    'required'      =>  'Password is required!',
                    'min_length'    =>  'Password must have more than 3 characters',
                    'validateUser'   =>  'Your data does not match'
                ],
            ];
            if ( ! $this->validate( $rules, $messages ) ){
                $data[ 'validation' ]   =   $this->validator;
            }else{
                $userModel  =   new User();
                $user       =   $userModel->where( 'email', $this->request->getVar( 'emailFrm' ) )->first();
                $this->setUserSession( $user );
                return redirect()->to( 'dashboard' );
            }
        }
        $renderT    =   \Config\Services::renderer();

        return $renderT->setData( $data )->render( 'Pages/Login' );
    }


    /**
     * @param $user
     * @return bool
     */
    private function setUserSession( $user ):bool
    {
        $data   =   [
            'id'            =>  $user[ 'id' ],
            'username'      =>  $user[ 'name' ],
            'email'         =>  $user[ 'email' ],
            'isLoggedIn'    =>  true
        ];
        session()->set( $data );
        return true;
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
                $userModel  =   new User();

                $newData    =   [
                    'name'      =>  $this->request->getVar( 'nameFrm' ),
                    'email'     =>  $this->request->getVar( 'emailFrm' ),
                    'password'  =>  $this->request->getVar( 'pwdFrm' ),
                ];

                try {
                    $userModel->save($newData);
                } catch ( ReflectionException $e ) {
                    die( "Error saving data: ".$e->getMessage() );
                }
                $session    =   session();
                $session->setFlashdata( 'success', 'Successfull Registration' );
                return redirect()->to( '/' );
            }

        }

        $renderT    =   \Config\Services::renderer();

        return $renderT->setData( $data )->render( 'Pages/Register' );
    }

    public function dashboard()
    {
        $data   =   [
            'title' =>  'Dashboard'
        ];

        $renderT    =   \Config\Services::renderer();
        return $renderT->setData( $data )->render( 'Pages/Dashboard' );
    }


}
