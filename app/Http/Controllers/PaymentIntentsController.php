<?php

namespace App\Http\Controllers;

use OpenAPI\Client\Api\SecurePaymentIntentApi;
use OpenAPI\Client\Model\PaymentIntentRequest;
use OpenAPI\Client\Model\PaymentIntentExpiresRequest;
use OpenAPI\Client\Model\PaymentIntentRequestIntent;
use OpenAPI\Client\Model\UpdateIntentRequest;
use OpenAPI\Client\ApiException;


use Exception;

class PaymentIntentsController extends Controller
{
    protected $apiInstance;

    public function __construct(SecurePaymentIntentApi $apiInstance)
    {
        
        $this->apiInstance = $apiInstance;
    }

    public function handleSecurePaymentIntents()
    {
        $path = 'requests/SecurePaymentIntentsCreate.json';
        $payload = json_decode(file_get_contents($path), true);
        
        $secure_payment_intent_request = new PaymentIntentRequest($payload);
        
        try {
            $result = $this->apiInstance->securePaymentintentsPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $secure_payment_intent_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleSecurePaymentIntentExpirations()
    {
        $path = 'requests/SecurePaymentIntentsExpirations.json';
        $payload = json_decode(file_get_contents($path), true);
        $id = $payload["id"];
        
        try {
            $result = $this->apiInstance->securePaymentintentsExpirationsPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $id
            );
            
            return $result[0];
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

}
