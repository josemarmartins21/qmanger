<?php

namespace App\Providers;

use App\Models\User;
use App\Services\users\contracts\UserInterface;
use App\Services\users\UserService;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
        UserInterface::class,
            UserService::class
        ); 
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('access-admin', function(User $user) {
            return $user->hasPermission('admin') || $user->hasPermission('super-admin');
        });

        Gate::define('admin', function(User $user) {
            return $user->hasPermission('admin');
        });
        
        Gate::define('super-admin', function(User $user) {
            return $user->hasPermission('super-admin');
        });
        
        Gate::define('default', function(User $user) {
            return $user->hasPermission('default');
        });
        
        Gate::define('can-edit-admin', function(User $user) {
            return $user->hasPermission('super-admin');
        });

        Gate::define('can-edit-default', function(User $user) {
            return $user->hasPermission('admin') || $user->hasPermission('super-admin');
        });
    }
}
