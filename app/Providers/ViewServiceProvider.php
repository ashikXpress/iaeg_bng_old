<?php

namespace App\Providers;

use App\Http\View\Composers\AdminLayoutComposer;
use App\Http\View\Composers\FrontLayoutComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer('layouts.frontend',FrontLayoutComposer::class);
        View::composer('layouts.admin',AdminLayoutComposer::class);

    }
}
