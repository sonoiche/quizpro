<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
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
    public function boot(): void
    {
        Gate::define('admin-only', function ($user) {
            return $user->isAdmin();
        });

        Gate::define('teacher-only', function ($user) {
            return $user->isTeacher();
        });

        Gate::define('student-only', function ($user) {
            return $user->isStudent();
        });
    }
}
