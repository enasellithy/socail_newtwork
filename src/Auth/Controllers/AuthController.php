namespace App\Auth\Controllers;

use App\Auth\Services\AuthService;
use Illuminate\Http\Request;

class AuthController
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(Request $request)
    {
        $data = $request->all();
        $user = $this->authService->register($data);
        return response()->json(['user' => $user], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->all();
        $user = $this->authService->login($credentials);
        if (!$user) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
        return response()->json(['user' => $user]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $this->authService->logout($user);
        return response()->json(['message' => 'Logged out successfully']);
    }

    public function updateProfile(Request $request)
    {
        $user = $request->user();
        $data = $request->all();
        $updatedUser = $this->authService->updateProfile($user, $data);
        return response()->json(['user' => $updatedUser]);
    }
}