<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\SOLID\Services\SocialAuthService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GithubAuthController extends Controller
{
    private $socialAuthService;

    public function __construct(SocialAuthService $socialAuthService)
    {
        $this->socialAuthService = $socialAuthService;
    }

    public function auth()
    {
        return Socialite::driver('github')->stateless()->redirect();
    }

    public function callback()
    {
        return $this->socialAuthService->callbackGithub();
    }
}
