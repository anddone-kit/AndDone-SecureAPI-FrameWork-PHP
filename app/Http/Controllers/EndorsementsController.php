<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAPI\Client\ApiException;
use OpenAPI\Client\Api\SecureEmbeddedPremiumFinanceEndorsementsApi;
use OpenAPI\Client\Model\PFUpdatePFARequestDTO;
use OpenAPI\Client\Model\PFEndorsementRequest;
use OpenAPI\Client\Model\PFCheckEndorsementsRequest;
use OpenAPI\Client\Model\PFQuoteBookingRequest;

class EndorsementsController extends Controller
{
    protected $apiInstance;

    public function __construct(SecureEmbeddedPremiumFinanceEndorsementsApi $apiInstance)
    {
        
        $this->apiInstance = $apiInstance;
    }

    public function handleBookEndorsement()
    {
        $path = 'requests/EPFBookEndorsement.json';
        $payload = json_decode(file_get_contents($path), true);
        $update_pfa_request = new PFUpdatePFARequestDTO($payload);
        
        try {
            $result = $this->apiInstance->secureEpfQuoteEndorsementBookingPutWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $update_pfa_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

     public function handleCreateEndorsement()
    {
        $path = 'requests/EPFEndorsementRequest.json';
        $payload = json_decode(file_get_contents($path), true);
        $update_request = new PFEndorsementRequest($payload);
        
        try {
            $result = $this->apiInstance->secureEpfQuoteEndorsementPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $update_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleRetreiveEndorsement()
    {
        $path = 'requests/EPFEndorsements.json';
        $payload = json_decode(file_get_contents($path), true);
        $endorse_request = new PFCheckEndorsementsRequest($payload);
        
        try {
            $result = $this->apiInstance->secureEpfEndorsementsPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $endorse_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }
}
