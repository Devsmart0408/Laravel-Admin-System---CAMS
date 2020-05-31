<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function ($user) {
            return $user->role == 1;
        });
        Gate::define('isStaff', function ($user) {
            return $user->role == 2;
        });
        Gate::define('isCustomer', function ($user) {
            return $user->role == 3;
        });
        Gate::define('isClient', function ($user) {
            return $user->role == 4;
        });

        Gate::define('all', function ($user) {
           $permission_array = explode(",", $user->permission);
           return in_array("all", $permission_array);
        });
        Gate::define('show', function ($user) {
            $permission_array = explode(",", $user->permission);
            return in_array("show", $user->permission);
        });
        Gate::define('create', function ($user) {
            $permission_array = explode(",", $user->permission);
            return in_array("create", $user->permission);
        });
        Gate::define('update', function ($user) {
            $permission_array = explode(",", $user->permission);
            return in_array("update", $user->permission);
        });
        Gate::define('delete', function ($user) {
            $permission_array = explode(",", $user->permission);
            return in_array("delete", $user->permission);
        });
        
    }
}
