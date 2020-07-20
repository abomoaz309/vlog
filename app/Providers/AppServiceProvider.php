<?php

namespace App\Providers;

use App\Models\page;
use App\Models\skill;
use App\Models\category;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('categories', category::get());
        view()->share('skills', skill::get());
        view()->share('pages', page::get());
    }
}
