<?php

namespace App\Addons\Blog\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AddonServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // load addon view path
        View::addNamespace('blog', app_path('Addons/Blog/views'));

        // load addon routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }

    public function register()
    {
        // Other service registration logic, if any
    }
}