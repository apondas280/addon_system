<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
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
    public function boot()
    {
        // Dynamically load service providers from the addons folder
        $addonsPath = app_path('Addons');

        if (File::isDirectory($addonsPath)) {
            // Scan all addon directories
            $addons = File::directories($addonsPath);

            foreach ($addons as $addon) {
                $providerPath = $addon . '/Providers/AddonServiceProvider.php';

                // Check if AddonServiceProvider exists
                if (File::exists($providerPath)) {
                    $namespace = 'App\\Addons\\' . basename($addon) . '\\Providers\\AddonServiceProvider';

                    // Register the service provider
                    $this->app->register($namespace);
                }
            }
        }
    }
}