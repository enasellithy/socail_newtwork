// Before
class UserService
{
    public function formatName($name)
    {
        return ucfirst(strtolower($name));
    }
}

// After
class UserService
{
    public function formatName(string $name): string
    {
        return str($name)->lower()->ucfirst();
    }
}