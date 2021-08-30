<?php
namespace  App\Filters;

use App\Controllers\Services\AuthService;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;


class AuthFilter implements FilterInterface {

    public function before( RequestInterface $request, $arguments = null)
    {
     /** @var AuthService $authService */
     $authService = service('auth', $request);

     if($authService->isLoggedIn()){
        return redirect()->to('');
     }
     else {
       return redirect()->to('auth/login');
     }


    }

    public function after( RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }


}