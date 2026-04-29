<?php

namespace App\Http\Controllers;

use OpenAPI\Client\ApiException;
use OpenAPI\Client\Api\SecurePaymentBatchingApi;
use OpenAPI\Client\Model\PaymentBatchCancellationRequest;

class BatchesCancelController extends Controller
{
    protected $apiInstance;

    public function __construct(SecurePaymentBatchingApi $apiInstance)
    {
        
        $this->apiInstance = $apiInstance;
    }

    public function handleBatchesTransactionCancel()
    {
        $path = 'requests/SecureBatchesCancellation.json';
        $payload = json_decode(file_get_contents($path), true);
        $cancel_batch_transaction_request = new PaymentBatchCancellationRequest($payload);
        
        try {
            $result = $this->apiInstance->secureBatchesTransactionsCancelPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $cancel_batch_transaction_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }
}
