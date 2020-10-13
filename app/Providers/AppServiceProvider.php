<?php

namespace App\Providers;

use App\Setting;
use App\PocketLimit;
use App\Contact;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Schema::enableForeignKeyConstraints();

        // uncomments
        // View::share('newMessages', Contact::where('readable', 0)->get());
        // View::share('allMessages', Contact::all());
        // View::share('setting', Setting::first());
        // View::share('pocketlimit', PocketLimit::first());
    }
}
