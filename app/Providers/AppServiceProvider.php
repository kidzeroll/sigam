<?php

namespace App\Providers;

use App\Models\ProfilGampong;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $gampong = ProfilGampong::first();
        view()->share('gampong', $gampong);
    }
}
