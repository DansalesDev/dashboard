<?php

namespace App\Controllers\Services;

use \Models\Business\UserRepository;


class AuthService  {

    private $username;
    private $password;

    public function __construct(string $username = '', string $password = '') {
        $this->password = $password;
        $this->username = $username;
    }

    public function  isLoggedIn(): bool  {
        return false;
    }

    public function signin(): bool {
        $userRepository = new UserRepository();
        $user = $userRepository->findBy(['username' => $this->username]);

        if($user) {
            'safsd';
        }

        return false;
    }

   public function signOut(): bool {
        return false;
   }

}