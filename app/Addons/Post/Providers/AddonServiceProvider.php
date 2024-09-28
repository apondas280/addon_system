<?php

namespace App\Addons\Post\Providers;

use Illuminate\Support\ServiceProvider;

class AddonServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }

    public function register()
    {
        // Other service registration logic, if any
    }
}