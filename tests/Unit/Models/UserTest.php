<?php

namespace Tests\Unit\Models;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_instance_creation()
    {
        $user = new User(['name' => 'Jane Doe', 'email' => 'jane@example.com']);
        $this->assertInstanceOf(User::class, $user);
    }

    public function test_user_email_is_required()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        User::create(['name' => 'John Doe']);
    }
}