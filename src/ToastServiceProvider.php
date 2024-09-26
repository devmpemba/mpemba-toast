<?php

namespace SalimMbise\ToastLibrary;

use Illuminate\Support\ServiceProvider;

class ToastServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Register a global function for toast messages
        if (!function_exists('toastr')) {
            function toastr()
            {
                return app('toast');
            }
        }

        // Publish assets (if needed)
        $this->publishes([
            __DIR__.'/../../vendor/salimmbise/mpemba-toast/public/css' => public_path('vendor/mpemba-toast/css'),
            __DIR__.'/../../vendor/salimmbise/mpemba-toast/public/js' => public_path('vendor/mpemba-toast/js'),
        ], 'toast-assets');
    }

    public function register()
    {
        // Bind the Toast class to the Laravel application
        $this->app->singleton('toast', function ($app) {
            return new Toast();
        });
    }
}
