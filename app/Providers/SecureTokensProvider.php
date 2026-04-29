<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use OpenAPI\Client\Configuration;
use OpenAPI\Client\Api\SecureTokenLinksApi;
use GuzzleHttp\Client;

class SecureTokensProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(SecureTokenLinksApi::class, function ($app) {
            require_once base_path('app/Libraries/SwaggerClient-php/vendor/autoload.php');

            $config = Configuration::getDefaultConfiguration()
                ->setApiKey('Origin', config('sdk.origin'))
                ->setApiKey('x-api-key', config('sdk.api_key'))
                ->setApiKey('x-app-key', config('sdk.app_key'));

            return new SecureTokenLinksApi(
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
