<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        Gate::define('isSuperAdmin', function ($user) {
            return $user->isSuperAdmin();
        });

        Gate::define('isManager', function ($user) {
            return $user->isManager();
        });

        Gate::define('isCourier', function ($user) {
            return $user->isCourier();
        });

        Gate::define('isNormalUser', function ($user) {
            return $user->isNormalUser();
        });
    }
}
