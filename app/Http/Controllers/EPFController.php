<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAPI\Client\ApiException;
use OpenAPI\Client\Api\SecureEmbeddedPremiumFinanceApi;
use OpenAPI\Client\Model\GetQuoteRequest;
use OpenAPI\Client\Model\GetQuoteKeyRequest;
use OpenAPI\Client\Model\QuoteRequest;
use OpenAPI\Client\Model\PFQuoteBookingRequest;
use OpenAPI\Client\Model\PFUpdatePFARequestDTO;
use OpenAPI\Client\Model\PFPolicyUpdateRequestDTO;
use OpenAPI\Client\Model\PFQuoteEsignRequest;

class EPFController extends Controller
{
    protected $apiInstance;

    public function __construct(SecureEmbeddedPremiumFinanceApi $apiInstance)
    {
        
        $this->apiInstance = $apiInstance;
    }

    public function handleGenerateQuote()
    {
        $path = 'requests/EPFQuotesGenerate.json';
        $payload = json_decode(file_get_contents($path), true);
        $quote_request = new QuoteRequest($payload);
        
        try {
            $result = $this->apiInstance->secureEpfQuotesGeneratePostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $quote_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleGetQuoteByIntent()
    {
        $path = 'requests/EPFQuotesByIntent.json';
        $payload = json_decode(file_get_contents($path), true);
        $quote_request = new GetQuoteRequest($payload);
        
        try {
            $result = $this->apiInstance->secureEpfQuotesIntentPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $quote_request
            );
            return $result[0][0];
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleGetQuoteByKey()
    {
        $path = 'requests/EPFQuotesByKey.json';
        $payload = json_decode(file_get_contents($path), true);
        $quote_request = new GetQuoteKeyRequest($payload);
        
        try {
            $result = $this->apiInstance->secureEpfQuotesPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $quote_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleRetreivePFA()
    {
        $path = 'requests/EPFRetrievePFA.json';
        $payload = json_decode(file_get_contents($path), true);
        $pfa_request = new PFUpdatePFARequestDTO($payload);
        
        try {
            $result = $this->apiInstance->secureEpfRetrievepfaPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $pfa_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleCaptureESign()
    {
        $path = 'requests/EPFCaptureeSign.json';
        $payload = json_decode(file_get_contents($path), true);
        $esign_request = new PFQuoteEsignRequest($payload);
        
        try {
            $result = $this->apiInstance->secureEpfQuotesCaptureesignPutWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $esign_request
            );
            return "Signature Complete";
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

       public function handleBookQuoteEndorsement()
    {
        $path = 'requests/EPFBookQuoteEndorsement.json';
        $payload = json_decode(file_get_contents($path), true);
        $quote_request = new PFQuoteBookingRequest($payload);
        
        try {
            $result = $this->apiInstance->secureEpfQuotesBookingPutWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $quote_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

  public function handleUpdateIntent()
    {
        $path = 'requests/EPFQuotesUpdateIntent.json';
        $payload = json_decode(file_get_contents($path), true);
        $quote_request = new PFPolicyUpdateRequestDTO($payload);
        
        try {
            $result = $this->apiInstance->secureEpfMerchantsQuotesPolicyPutWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $quote_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

}
