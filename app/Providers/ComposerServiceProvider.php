<?php

namespace App\Providers;

use App\Menu;
use App\Page;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        View::composer('*', function ($view) {
            $view->with('pages', Page::orderBy('id')->get())->with('menus', Menu::orderBy('order', 'ASC')->get());
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
