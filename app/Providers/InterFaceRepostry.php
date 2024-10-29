<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\CoursesInterface;
use App\Repositories\CoursesRepostry;
use App\Interfaces\opesideInterface;
use App\Repositories\opesideRepostry;

class InterFaceRepostry extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(CoursesInterface::class, CoursesRepostry::class);
        $this->app->bind(opesideInterface::class, opesideRepostry::class);
    }
}
