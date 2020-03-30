<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            'App\Repositories\Admin\Interfaces\RoleRepositoryInterface',
            'App\Repositories\Admin\Repository\RoleRepository'
        );
        $this->app->bind(
            'App\Repositories\Admin\Interfaces\PermissionRepositoryInterface',
            'App\Repositories\Admin\Repository\PermissionRepository'
        );
        $this->app->bind(
            'App\Repositories\Admin\Interfaces\UserRepositoryInterface',
            'App\Repositories\Admin\Repository\UserRepository'
        );
        $this->app->bind(
            'App\Repositories\Api\Interfaces\AuthRepositoryInterface',
            'App\Repositories\Api\Repository\AuthRepository'
        );
        $this->app->bind(
            'App\Repositories\Admin\Interfaces\RealestateRepositoryInterface',
            'App\Repositories\Admin\Repository\RealestateRepository'
        );
    }
    }

