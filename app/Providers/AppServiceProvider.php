<?php

namespace App\Providers;

use Braintree\Gateway;
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
        //
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'n6bdrym272w78zgq',
                    'publicKey' => '93qwd4k2x8fw5jmn',
                    'privateKey' => 'c5800d51357f1d9ddde252715e87a327'
                ]
            );
        });
    }
}
