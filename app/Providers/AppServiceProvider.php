<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            if (!\Illuminate\Support\Facades\Schema::hasTable('settings')) return;

            $setting = \App\Models\Setting::first();
            $categories = \App\Models\Category::where('is_visible_on_home', true)->get();
            $footer_categories = \App\Models\Category::where('show_in_footer', true)->get();

            $currentUrl = request()->fullUrl();
            $currentPath = request()->getPathInfo();
            $trimmedPath = trim($currentPath, '/');

            $searchPaths = [$currentUrl, $currentPath, $trimmedPath, '/' . $trimmedPath];
            if ($currentPath == '/') {
                $searchPaths[] = 'home';
                $searchPaths[] = '/';
            }

            $seo = \App\Models\SeoSetting::whereIn('page_url', array_unique($searchPaths))->first();

            $view->with('app_setting', $setting);
            $view->with('app_categories', $categories);
            $view->with('footer_categories', $footer_categories);
            $view->with('app_seo', $seo);
        });
    }
}
