<?php

namespace App\Providers;

use App\View\Composers\CategoryComposer;
use App\View\Composers\FooterComposer;
use App\View\Composers\HeaderComposer;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // ...
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Using class based composers...
        Facades\View::composer('admin.courses.*', CategoryComposer::class);
        Facades\View::composer('shared.footer', FooterComposer::class);
        Facades\View::composer('shared.header', HeaderComposer::class);
    }
}
