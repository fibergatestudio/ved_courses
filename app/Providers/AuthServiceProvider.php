<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        /* Гейт: Администратор */
        Gate::define('admin_rights', function($user){
            return $user->isAdmin();
        });

        /* Гейт: Студент */
        Gate::define('student_rights', function($user){
            return $user->isStudent();
        });

        /* Гейт: Учитель */
        Gate::define('teacher_rights', function($user){
            return $user->isTeacher();
        });
    }
}
