<?php

namespace App\Services;

use App\Repository\UserRepositoryInterface;

class UserService{

    protected $UserRepository;

    public function __construct(UserRepositoryInterface $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }


    public function getUsersCollection(){
        return $this->UserRepository->all();
    }
}
