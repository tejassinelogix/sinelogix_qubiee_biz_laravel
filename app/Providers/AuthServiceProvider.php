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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
          Gate::resource('products', 'App\Policies\ProductPolicy'); 
        Gate::define('products.tag', 'App\Policies\ProductPolicy@tag'); 
        Gate::define('products.category', 'App\Policies\ProductPolicy@category'); 
        Gate::define('products.permission', 'App\Policies\ProductPolicy@permission'); 
       Gate::define('products.roles', 'App\Policies\ProductPolicy@roles'); 
        Gate::define('products.users', 'App\Policies\ProductPolicy@users'); 
    }
}
