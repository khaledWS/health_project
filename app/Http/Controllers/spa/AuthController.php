<?php

namespace App\Http\Controllers\spa;


use App\http\Controllers\Controller;
use App\Http\Requests\loginRequest;
use App\Http\Traits\SpaResponseTrait;
use App\Repositories\interfaces\UserRepositoryInterface;
use App\Services\AuthenticationService;
use Exception;


class AuthController extends Controller
{
    use SpaResponseTrait;

    private $authenticationService;

    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }



    public function login(loginRequest $request)
    {
        try {
            $user = $this->authenticationService->loginSPA($request->validated());

            if ($user) {
                return $this->successResponse();
            }
        } catch (\Throwable $th) {
            return $this->errorResponse();
        }
    }


    public function logout()
    {
        try {
            $status = $this->authenticationService->logoutSPA();
            if ($status) {
                return $this->successResponse();
            } else {
                throw new Exception();
            }
        } catch (\Throwable $th) {
            return $this->errorResponse();
        }
    }
}
