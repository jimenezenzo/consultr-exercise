<?php

namespace App\Providers;

use App\Repositorys\SuperHeroRepository;
use App\Repositorys\SuperHeroRepositoryInterface;
use App\Services\SuperHeroService;
use App\Services\SuperHeroServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SuperHeroServiceInterface::class, SuperHeroService::class);
        $this->app->bind(SuperHeroRepositoryInterface::class, SuperHeroRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
