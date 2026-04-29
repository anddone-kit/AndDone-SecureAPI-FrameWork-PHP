<?php

namespace App\Http\Controllers;

use OpenAPI\Client\ApiException;
use OpenAPI\Client\Api\SecurePremiumFinanceLiteApi;
use OpenAPI\Client\Model\PFLiteSecureQuoteRequest;
use OpenAPI\Client\Model\PFLiteGetQuoteRequest;
use OpenAPI\Client\Model\PFLitePaymentLinkRequest;

class EPFLiteController extends Controller
{
    protected $apiInstance;

    public function __construct(SecurePremiumFinanceLiteApi $apiInstance)
    {
        
        $this->apiInstance = $apiInstance;
    }

    public function handleEpfQuoteCreate()
    {
        $path = 'requests/EPFLinksQuoteCreate.json';
        $payload = json_decode(file_get_contents($path), true);
        $link_request = new PFLiteSecureQuoteRequest($payload);
        
        try {
            $result = $this->apiInstance->secureEpfliteQuotesGeneratePostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $link_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

   public function handleEpfPaymentLinkCreate()
    {
        $path = 'requests/EPFLinksPaymentLinkCreate.json';
        $payload = json_decode(file_get_contents($path), true);
        $link_request = new PFLitePaymentLinkRequest($payload);
        
        try {
            $result = $this->apiInstance->secureEpfliteQuotesPaymentlinksPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $link_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

   public function handleEpfPaymentLinkGetQuote()
    {
        $path = 'requests/EPFLinksGetByPaymentLink.json';
        $payload = json_decode(file_get_contents($path), true);
        $link_request = new PFLiteGetQuoteRequest($payload);
        
        try {
            $result = $this->apiInstance->secureEpfliteQuotesLinkPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $link_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

}
