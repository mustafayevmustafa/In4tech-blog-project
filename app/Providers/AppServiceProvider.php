<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Role;
use App\Observers\BlogObserver;
use App\Observers\RoleObserver;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        Role::observe(RoleObserver::class);
    }
}
