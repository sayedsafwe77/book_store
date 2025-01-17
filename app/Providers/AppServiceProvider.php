<?php

namespace App\Providers;

use App\Faker\BookProvider;
use App\Faker\CategoryProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Faker\{Factory, Generator};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        fake()->addProvider(new CategoryProvider(fake()));
        fake()->addProvider(new BookProvider(fake()));
        Paginator::useBootstrapFive();
    }
}
