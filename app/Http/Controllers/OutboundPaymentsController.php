<?php

namespace App\Http\Controllers;

use OpenAPI\Client\ApiException;
use OpenAPI\Client\Api\SecureOutboundPaymentsApi;
use OpenAPI\Client\Model\PaymentRequestDto;
use OpenAPI\Client\Model\PaymentRequestDetailDTO;
use OpenAPI\Client\Model\PaymentTimeLineRequestDto;
use OpenAPI\Client\Model\CancelPaymentRequestDTO;

class OutboundPaymentsController extends Controller
{
    protected $apiInstance;

    public function __construct(SecureOutboundPaymentsApi $apiInstance)
    {
        
        $this->apiInstance = $apiInstance;
        $config = $this->apiInstance->getConfig();
        $config->setHost('https://api2.uat.anddone.com');
    }

    public function handleOutboundPaymentsCreate()
    {
        $path = 'requests/SecureOutboundPaymentsCreate.json';
        $payload = json_decode(file_get_contents($path), true);
        $payment_request = new PaymentRequestDto($payload);
        try {
            $result = $this->apiInstance->vendorapiSecureOutboundpaymentsPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'),
                config('sdk.origin'), 
                $payment_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleOutboundPaymentsDetails()
    {
        $path = 'requests/SecureOutboundPaymentsDetails.json';
        $payload = json_decode(file_get_contents($path), true);
        $payment_details = new PaymentRequestDetailDTO($payload);
        
        try {
            $result = $this->apiInstance->vendorapiSecureOutboundpaymentsDetailPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'),
                config('sdk.origin'), 
                $payment_details
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleOutboundPaymentsSearch()
    {
        $path = 'requests/SecureOutboundPaymentsSearch.json';
        $payload = json_decode(file_get_contents($path), true);
        //$payment_search = new PaymentRequestDetailDTO($payload);
        
        try {
            $result = $this->apiInstance->vendorapiSecureOutboundpaymentsSearchPostWithHttpInfo(
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

    public function handleOutboundPaymentsTimelines()
    {
        $path = 'requests/SecureOutboundPaymentsTimelines.json';
        $payload = json_decode(file_get_contents($path), true);
        $payment_timelines = new PaymentTimeLineRequestDto($payload);
        
        try {
            $result = $this->apiInstance->vendorapiSecureOutboundPaymentsTimelinesPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'),
                config('sdk.origin'),
                $payment_timelines
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleOutboundPaymentsCancel()
    {
        $path = 'requests/SecureOutboundPaymentsCancel.json';
        $payload = json_decode(file_get_contents($path), true);
        $payment_cancel = new CancelPaymentRequestDTO($payload);
        
        try {
            $result = $this->apiInstance->vendorapiSecureOutboundpaymentsCancelPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'),
                config('sdk.origin'),
                $payment_cancel
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }
}
