<?php

namespace App\Providers;

use App\Interfaces\Reposities\CategoryReposityInterface;
use App\Interfaces\Reposities\CourseReposityInterface;
use App\Interfaces\Reposities\UserReposityInterface;
use App\Interfaces\Services\CategoryServiceInterface;
use App\Interfaces\Services\CourseServiceInterface;
use App\Interfaces\Services\UserServiceInterface;
use App\Reposities\CategoryReposity;
use App\Reposities\CourseReposity;
use App\Reposities\UserReposity;
use App\Services\CategoryService;
use App\Services\CourseService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class ConnectorProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserReposityInterface::class,UserReposity::class);
        $this->app->bind(UserServiceInterface::class,UserService::class);
        $this->app->bind(CategoryReposityInterface::class,CategoryReposity::class);
        $this->app->bind(CategoryServiceInterface::class,CategoryService::class);
        $this->app->bind(CourseReposityInterface::class,CourseReposity::class);
        $this->app->bind(CourseServiceInterface::class,CourseService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
