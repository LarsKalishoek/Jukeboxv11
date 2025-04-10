<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Song;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with('songs', Song::all());
        });
    }

    /**
     * Bootstrap any application services.
     */
}
