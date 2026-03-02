// Before
class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $collection = collect([1, 2, 3]);
        $filteredCollection = $collection->filter(function ($item) {
            return $item > 1;
        });
    }
}

// After
class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $collection = collect([1, 2, 3]);
        $filteredCollection = $collection->filter(fn ($item) => $item > 1);
    }
}