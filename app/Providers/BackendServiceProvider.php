<?php

namespace App\Providers;

use App\Services\Cinema\CinemaService;
use App\Services\Cinema\CinemaServiceInterface;
use App\Services\General\GeneralService;
use App\Services\General\GeneralServiceInterface;
use App\Services\Movie\MovieService;
use App\Services\Movie\MovieServiceInterface;
use App\Services\Task\TaskService;
use App\Services\Task\TaskServiceInterface;
use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TaskServiceInterface::class, TaskService::class);
        $this->app->bind(GeneralServiceInterface::class, GeneralService::class);
        $this->app->bind(MovieServiceInterface::class, MovieService::class);
        $this->app->bind(CinemaServiceInterface::class, CinemaService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
