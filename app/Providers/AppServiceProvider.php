<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\SocialLink;
use Illuminate\Pagination\Paginator;
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
        //
        $links = SocialLink::all();
        $setting = Setting::first();
        // $page = Page::all();

        view()->share('links',$links);
        view()->share('setting',$setting);
        // view()->share('page',$page);


        Paginator::useBootstrap();
    }
}
