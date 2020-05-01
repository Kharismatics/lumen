<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
    public function boot()
    {
        $route = URL::current();
        $uri_parts = explode('/', $route);
        $uri_base = URL::to('/');;
        $uri_tail = end($uri_parts);
        view()->share('script_src', $uri_base."/dist/js/pages/".$uri_tail.".js");
        view()->share('routes', $uri_tail);
    }
}
