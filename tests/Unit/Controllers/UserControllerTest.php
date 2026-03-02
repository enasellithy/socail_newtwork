<?php

namespace Tests\Unit\Controllers;

use App\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_user_successfully()
    {
        $controller = new UserController();
        $request = new Request(['name' => 'John Doe', 'email' => 'john@example.com']);
        $response = $controller->create($request);
        $this->assertInstanceOf(User::class, $response);
    }

    public function test_create_user_fails_due_to_validation()
    {
        $controller = new UserController();
        $request = new Request(['name' => '', 'email' => 'invalid']);
        $this->expectException(\Illuminate\Validation\ValidationException::class);
        $controller->create($request);
    }
}