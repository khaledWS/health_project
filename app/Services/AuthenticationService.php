<?php

namespace App\Services;

use App\Exceptions\IncorrectPasswordException;
use App\Exceptions\UserNotFoundException;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class AuthenticationService
{

    protected $UserRepository;

    public function __construct(UserRepository $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }


    public function loginSPA($attributes): ?User
    {
        $user = $this->UserRepository->findByEmail($attributes['email']);
        $user->identity;

        if (!$user) {
            throw new UserNotFoundException();
        }

        if ($user->password !== md5($attributes['password'])) {
            throw new IncorrectPasswordException();
        }

        Auth::loginUsingId($user->id);
        return $user;
    }

    public function logoutSPA()
    {
        Auth::logout();

        session()->invalidate();

        session()->regenerateToken();

        return true;
    }
}
