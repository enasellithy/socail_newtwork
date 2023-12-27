<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    use Authenticatable;

    public function test_login_email_required()
    {
        $this->json('POST', 'api/login')
            ->assertStatus(400)
            ->assertJson([
                "status" => false,
                "message" => "The email field is required.",
                "data" => null
            ]);
    }

    public function test_auth_login_successfully()
    {
        $user = User::factory(1)->create([
            'name' => 'test',
            'email' => 'test@mail.com',
            'password' => '123456',
        ]);
        $response = $this->json('POST', 'api/login',[
            'email' => 'test@mail.com',
            'password' => '123456',
        ]);
        $response->assertStatus(200);
        $response->assertJson([
            "status" => true,
            "message" => "Success",
            "data" => []
        ]);
        $response->assertJsonStructure([
            'data' => [
                'token',
                'user' => [
                    'id',
                    "name",
                    "email",
                    "image"
                ]
            ]
        ]);
    }
}
