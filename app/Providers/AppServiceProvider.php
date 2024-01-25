<?php

namespace App\Providers;

use App\Models\Contact;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer("admin.includes.nav",function($view){
            $counts=Contact::where("unread",0)->count();
            $view->with("unread",$counts);
        });
       Paginator::useBootstrap();
    }
}
