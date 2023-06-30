<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\UserRepository;
use App\Repositories\StockRepository;

use App\Interfaces\EloquentInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\StockRepositoryInterface;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(EloquentInterface::class, BaseRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(StockRepositoryInterface::class, StockRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
