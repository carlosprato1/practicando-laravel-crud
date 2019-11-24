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

         Gate::define('isAdmin',function ($user,$project){return $user->role == "3";});
         Gate::define('isEmpleado',function ($user){return $user->role == "1";});

         Gate::define('solo-admin-show-project-3',function ($user,$projectId){
            if ( $user->role != "3") {
              if ( $projectId == "3") {
                  return false; // call denies redireccionar
              }
            }
                 return true;
         });
    }
}
