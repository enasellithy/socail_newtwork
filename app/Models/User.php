// Before
class User extends Model
{
    public function __construct(array $attributes = [])
    {
        $this->name = $attributes['name'] ?? null;
        $this->email = $attributes['email'] ?? null;
    }
}

// After
class User extends Model
{
    public function __construct(
        public string $name,
        public string $email,
    ) {}
}