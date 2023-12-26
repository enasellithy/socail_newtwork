<?php

namespace App\SOLID\Services;

use App\SOLID\Repositories\AuthRepository;

class AuthService
{
    private $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register($data)
    {
        return $this->authRepository->register($data);
    }

    public function login($data)
    {
        return $this->authRepository->login($data);
    }

    public function updateProfile($data)
    {
        return $this->updateProfile($data);
    }
}
