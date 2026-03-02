namespace Tests\Feature;

use App\Auth\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_register()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password',
        ];

        $response = $this->post('/api/register', $data);

        $response->assertStatus(201);
        $response->assertJsonStructure(['user']);
        $this->assertDatabaseHas('users', ['email' => $data['email']]);
    }

    public function test_login()
    {
        $user = factory(User::class)->create();

        $credentials = [
            'email' => $user->email,
            'password' => 'password',
        ];

        $response = $this->post('/api/login', $credentials);

        $response->assertStatus(200);
        $response->assertJsonStructure(['user']);
        $this->assertDatabaseHas('users', ['email' => $user->email]);
    }

    public function test_logout()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->post('/api/logout');

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Logged out successfully']);
    }

    public function test_update_profile()
    {
        $user = factory(User::class)->create();

        $data = [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
        ];

        $response = $this->actingAs($user)->post('/api/update-profile', $data);

        $response->assertStatus(200);
        $response->assertJsonStructure(['user']);
        $this->assertDatabaseHas('users', ['email' => $data['email']]);
    }

    public function test_update_profile_invalid_data()
    {
        $user = factory(User::class)->create();

        $data = [
            'name' => '',
            'email' => '',
        ];

        $response = $this->actingAs($user)->post('/api/update-profile', $data);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('name');
        $response->assertJsonValidationErrors('email');
    }
}