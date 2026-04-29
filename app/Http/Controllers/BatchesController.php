<?php

namespace App\Http\Controllers;

use OpenAPI\Client\ApiException;
use OpenAPI\Client\Api\SecurePaymentBatchingApi;
use OpenAPI\Client\Model\SecureBatchExecuteRequest;
use OpenAPI\Client\Model\BatchTimelineRequest;
use OpenAPI\Client\Model\SecurePaymentBatchDetailsRequest;

class BatchesController extends Controller
{
    protected $apiInstance;

    public function __construct(SecurePaymentBatchingApi $apiInstance)
    {
        
        $this->apiInstance = $apiInstance;
    }

    public function handleGetBatches()
    {
        $path = 'requests/SecureBatchesRequest.json';
        $payload = json_decode(file_get_contents($path), true);
        $startRow = $payload["StartRow"];
        
        try {
            $result = $this->apiInstance->secureBatchesPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'),
                config('sdk.origin') 
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleExecute()
    {
        $path = 'requests/SecureBatchesExecute.json';
        $payload = json_decode(file_get_contents($path), true);
        $batch_execute_request = new SecureBatchExecuteRequest($payload);
        
        try {
            $result = $this->apiInstance->secureBatchesExecutePost(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'),
                config('sdk.origin'), 
                $batch_execute_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleTimelines()
    {
        $path = 'requests/SecureBatchesTimelines.json';
        $payload = json_decode(file_get_contents($path), true);
        $batch_timelines_request = new SecurePaymentBatchDetailsRequest($payload);
        
        try {
            $result = $this->apiInstance->secureBatchesTimelinesPost(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'),
                config('sdk.origin'), 
                $batch_timelines_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleDetails()
    {
        $path = 'requests/SecureBatchesDetails.json';
        $payload = json_decode(file_get_contents($path), true);
        $batch_details_request = new SecurePaymentBatchDetailsRequest($payload);
        
        try {
            $result = $this->apiInstance->secureBatchesDetailsPost(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'),
                config('sdk.origin'), 
                $batch_details_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

}
