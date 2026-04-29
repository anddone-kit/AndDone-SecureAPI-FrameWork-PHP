<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAPI\Client\Api\SecureRefundsApi;
use OpenAPI\Client\Model\SecureTransactionRefundRequest;
use OpenAPI\Client\Model\TransactionRefundEligibilityRequest;
use OpenAPI\Client\ApiException;

use Exception;

class RefundsController extends Controller
{
    protected $apiInstance;

    public function __construct(SecureRefundsApi $apiInstance)
    {
        $this->apiInstance = $apiInstance;
    }

    public function handleSecureRefunds()
    {
        $path = 'requests/SecureRefundRequest.json';
        $payload = json_decode(file_get_contents($path), true);
        $transaction_refund_request = new SecureTransactionRefundRequest( $payload );
        
        try {
            $result = $this->apiInstance->secureRefundsPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $transaction_refund_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleSecureRefundsEligibility()
    {
        $path = 'requests/SecureRefundsEligibility.json';
        $payload = json_decode(file_get_contents($path), true);
        $transaction_refund_eligibility_request = new TransactionRefundEligibilityRequest( $payload );
        
        try {
            $result = $this->apiInstance->secureRefundsEligibilityPost(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $transaction_refund_eligibility_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }
}
