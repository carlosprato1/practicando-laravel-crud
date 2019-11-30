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

       // Ej. cancelado. no hay prohibision en view.
      //   Gate::define('isAdmin',function ($user,$project){return $user->role == "3";});  // Solo admin pueden editar

         Gate::define('solo-admin-show-project-3',function ($user,$projectId){   //si le paso Project no agarra el view. solo agarra del get
            if ( $user->role != "3" && $projectId == "3") {
                  return false; // call denies redireccionar
            }
               return true;
         });
    }
}
