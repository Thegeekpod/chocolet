<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        \Illuminate\Support\Facades\View::composer(['frontend.*', 'layouts.frontend'], function ($view) {
            $setting = \Illuminate\Support\Facades\Schema::hasTable('settings')
                ? \App\Models\Setting::first()
                : null;
            $categories = \Illuminate\Support\Facades\Schema::hasTable('categories')
                ? \App\Models\Category::where('is_visible_on_home', true)->get()
                : collect();

            $view->with('app_setting', $setting);
            $view->with('app_categories', $categories);
        });
    }
}
