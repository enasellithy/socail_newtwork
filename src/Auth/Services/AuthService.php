namespace App\Auth\Services;

use App\Auth\Repositories\UserRepository;

class AuthService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register($data)
    {
        return $this->userRepository->register($data);
    }

    public function login($credentials)
    {
        return $this->userRepository->login($credentials);
    }

    public function logout($user)
    {
        return $this->userRepository->logout($user);
    }

    public function updateProfile($user, $data)
    {
        return $this->userRepository->updateProfile($user, $data);
    }
}