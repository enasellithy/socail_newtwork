<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    use Authenticatable;

    public function test_register_name_required()
    {
        $this->json('POST', 'api/register')
            ->assertStatus(400)
            ->assertJson([
                "status" => false,
                "message" => "The name field is required.",
                "data" => null
            ]);
    }

    public function test_auth_register_successfully()
    {
        $response = $this->json('POST', 'api/register',[
            'email' => 'FeatureTest@mail.com',
            'password' => '123456',
            'password_confirm' => '123456',
            'name' => 'test'
        ]);
        $response->assertStatus(200);
        $response->assertJson([
                "status" => true,
                "message" => "Success",
                "data" => "",
            ]);
    }
}
