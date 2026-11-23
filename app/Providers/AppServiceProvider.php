<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        URL::resolveMissingNamedRoutesUsing(function ($name, $parameters, $absolute) {
            if ($name === 'dashboard.index') {
                return route('dashboard', $parameters, $absolute);
            }
            if ($name === 'dashboard') {
                return route('dashboard.index', $parameters, $absolute);
            }
            if ($name === 'user.list') {
                return route('users.index', $parameters, $absolute);
            }
            if (str_starts_with($name, 'user.')) {
                $pluralName = 'users.' . substr($name, 5);
                if (\Illuminate\Support\Facades\Route::has($pluralName)) {
                    return route($pluralName, $parameters, $absolute);
                }
            }
            return null;
        });
    }
}
