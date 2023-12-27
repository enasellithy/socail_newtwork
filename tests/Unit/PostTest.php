<?php

namespace Tests\Unit;

use App\Http\Resources\API\PostResource;
use App\Models\Post;
use App\Models\User;
use App\SOLID\Traits\JsonTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    use Authenticatable;
    use JsonTrait;

    public function test_auth_show_post_successfully()
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
        $token = $response['data']['token'];
        $response2 = $this->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => $token,
        ])->get('/api/posts');
        $response2->assertStatus(200);
        $response2->assertJson([
            "status" => true,
            "message" => "Success",
            "data" => []
        ]);
    }

    public function test_auth_create_post_successfully()
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
        $token = $response['data']['token'];
        $response2 = $this->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => $token,
        ])->post('/api/posts',[
            'content' => 'test'
        ]);
        $response2->assertStatus(200);
    }
}
