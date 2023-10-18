<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CategoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CategoryServiceInterface::class,
            CategoryService::class,
            BarangServicesInterface::class,
            BarangServices::class,
            StandServicesInterface::class,
            StandServices::class,
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
