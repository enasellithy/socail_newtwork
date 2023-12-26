<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Auth\LoginRequest;
use App\SOLID\Services\AuthService;
use App\SOLID\Traits\JsonTrait;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $r)
    {
        return $this->authService->login($r->all());
    }
}
