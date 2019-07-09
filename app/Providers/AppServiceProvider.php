<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\SillaRepositoryContract;
use App\Repositories\EloquentSillaRepository;

class AppServiceProvider extends ServiceProvider
{

    /** @var array Define las vinculaciones de interfaces a implementaciones. */
    public $bindings = [
        SillaRepositoryContract::class => EloquentSillaRepository::class,
    ];
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Illuminate\Support\Facades\Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    //  $this->app->bind('App\MyRepoInterface', 'App\EloquentMyRepo');
    }
}
