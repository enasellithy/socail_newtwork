<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $collection = collect([1, 2, 3]);
        $filteredCollection = $collection->filter(fn ($item) => $item > 1);
    }

    public function register()
    {
        //
    }
}