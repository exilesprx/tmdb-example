<?php

namespace App\Providers;

use App\ValueObjects\MovieCacheTtl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            MovieCacheTtl::class,
            function() {
                return new MovieCacheTtl(env("MOVIE_CACHE_MINUTES"));
            }
        );
    }
}
