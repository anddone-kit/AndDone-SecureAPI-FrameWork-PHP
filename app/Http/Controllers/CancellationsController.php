<?php

namespace App\Http\Controllers;

use OpenAPI\Client\Model\SecureTransactionCancelRequest;
use OpenAPI\Client\ApiException;


use Exception;
use OpenAPI\Client\Api\SecureVoidsApi;

class CancellationsController extends Controller
{
    protected $apiInstance;

    public function __construct(SecureVoidsApi $apiInstance)
    {
        
        $this->apiInstance = $apiInstance;
    }

    public function handleSecureCancellations()
    {
        $path = 'requests/CancellationsPayment.json';
        $payload = json_decode(file_get_contents($path), true);
        
        $cancel_request = new SecureTransactionCancelRequest($payload);
        
        try {
            $result = $this->apiInstance->secureCancellationsPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $cancel_request
            );
            return "Cancelled";
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

}
