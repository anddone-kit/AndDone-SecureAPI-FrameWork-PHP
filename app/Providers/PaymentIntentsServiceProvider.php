<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use OpenAPI\Client\Configuration;
use OpenAPI\Client\Api\SecurePaymentIntentApi;
use GuzzleHttp\Client;

class PaymentIntentsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(SecurePaymentIntentApi::class, function ($app) {
            require_once base_path('app/Libraries/SwaggerClient-php/vendor/autoload.php');

            $config = Configuration::getDefaultConfiguration()
                ->setApiKey('Origin', config('sdk.origin'))
                ->setApiKey('x-api-key', config('sdk.api_key'))
                ->setApiKey('x-app-key', config('sdk.app_key'));

            return new SecurePaymentIntentApi(
                new Client(),
                $config
            );
        });
    }

    public function boot()
    {
        //
    }
}


