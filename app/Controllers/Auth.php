<?php

namespace App\Controllers;

class Auth extends BaseController {

    public function login() : void {
        $this->view('auth/form');

    }
    public function forgot() : void {
        $this->view('auth/forgot');
    }

    public function signin() {

    }

    public function  renewVerify() {
        try {
           return  redirect()->to('auth/renew');
        } catch ( \Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }


    public function renew() {
        $this->view('auth/renew');
    }

    public function updateCredentials() {
        return redirect('auth/login');
    }



}