<?php

namespace App\SOLID\Services;

use App\SOLID\Repositories\SocialAuthRepository;

class SocialAuthService
{
    private $socialAuthRepository;

    public function __construct(SocialAuthRepository $socialAuthRepository)
    {
        $this->socialAuthRepository = $socialAuthRepository;
    }

    public function callbackGithub()
    {
        return $this->socialAuthRepository->callbackGithub();
    }

    public function callbackGoogle()
    {
        return $this->socialAuthRepository->callbackGoogle();
    }
}
