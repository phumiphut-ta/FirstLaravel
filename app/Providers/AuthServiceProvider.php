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

        Gate::define('customer-edit',function($user)
        { 
            //นิยามให้ User ใดสามารถได้สิทธิ แก้ไข Customer
            if($user->email == 'admin@example.com') 
            {
                return true;
            }
            else
            {
                return false;
            }
        });
        Gate::define('customer-delete',function($user)
        {
            if($user->email == 'admin@example.com')
            {
                return true;
            }
            else
            {
                return false;
            }
            return true;
        });
    }
    
}
