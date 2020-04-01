<?php

namespace App\Providers;

use App\Http\View\Composers\FrontLayoutComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class FrontendLayoutProvider extends ServiceProvider
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

    }
}
