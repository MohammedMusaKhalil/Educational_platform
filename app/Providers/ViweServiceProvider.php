<?php

namespace App\Providers;

use App\Models\cat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class ViweServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('Front.inc.header',function ($view){
        $view->with('cats',DB::table('cats')->select('id','name')->get());
        $view->with('sett',DB::table('settings')->select('logo','favicon')->first());

        });
        view()->composer('Front.inc.footer',function ($view){
        $view->with('sett',DB::table('settings')->first());
        });

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
