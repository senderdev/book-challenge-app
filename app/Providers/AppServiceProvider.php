<?php

namespace App\Providers;

use App\Contracts\AccessTokenContract;
use App\Contracts\BookContract;
use App\Contracts\UserContract;
use App\Services\AccessTokenService;
use App\Services\BookService;
use App\Services\UserService;
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
        $this->app->singleton(AccessTokenContract::class, AccessTokenService::class);
        $this->app->singleton(UserContract::class, UserService::class);
        $this->app->singleton(BookContract::class, BookService::class);
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
