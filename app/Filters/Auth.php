<?php
namespace App\Filters;

use \CodeIgniter\HTTP\ResponseInterface;
use \CodeIgniter\HTTP\RequestInterface;
use \CodeIgniter\Filters\FilterInterface;


/**
 * Class Auth
 * @package App\Filters
 */
class Auth implements FilterInterface{
    public function before(RequestInterface $request, $arguments = null)
    {
        if ( ! session()->get( 'isLoggedIn' ) ):
            return redirect()->to( '/' );
            endif;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}