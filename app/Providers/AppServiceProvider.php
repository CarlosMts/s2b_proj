<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Space;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    

    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('layouts.admin', function($view)
        {
            $countNewSpaces = DB::table('spaces')
            ->where('admin_reviewed', 0)
            ->count();

            $view->with('countNewSpaces', $countNewSpaces);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
