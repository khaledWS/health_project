<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService{

    protected $UserRepository;

    public function __construct(UserRepository $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }


    public function getUsersCollection(){
        return $this->UserRepository->all();
    }
}
