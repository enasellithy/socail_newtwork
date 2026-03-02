namespace App\Auth\Repositories;

use App\Auth\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function register($data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();
        return $user;
    }

    public function login($credentials)
    {
        $user = User::where('email', $credentials['email'])->first();
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return null;
        }
        return $user;
    }

    public function logout($user)
    {
        // Logout logic
        $user->remember_token = null;
        $user->save();
    }

    public function updateProfile($user, $data)
    {
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();
        return $user;
    }
}