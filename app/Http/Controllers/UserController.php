// Before
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $filteredUsers = array_filter($users, function ($user) {
            return $user->isAdmin();
        });
        return $filteredUsers;
    }
}

// After
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $filteredUsers = $users->filter(fn ($user) => $user->isAdmin());
        return $filteredUsers;
    }
}