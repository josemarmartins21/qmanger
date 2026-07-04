<?php

namespace App\Providers;

use App\Models\User;
use App\Services\accounts\AccountService;
use App\Services\accounts\contracts\AccountInterface;
use App\Services\contacts\ContactService;
use App\Services\contacts\contracts\ContactInterface;
use App\Services\plans\contracts\PlanInterface;
use App\Services\plans\PlanService;
use App\Services\signatures\contracts\SignatureInterface;
use App\Services\signatures\SignatureService;
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
        
        $this->app->bind(
            PlanInterface::class,
            PlanService::class
        ); 
        
        $this->app->bind(
            ContactInterface::class,
            ContactService::class
        ); 

        $this->app->bind(
            AccountInterface::class,
            AccountService::class,
        );
        
        $this->app->bind(
            SignatureInterface::class,
            SignatureService::class
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
