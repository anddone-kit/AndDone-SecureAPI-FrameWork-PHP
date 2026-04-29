<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAPI\Client\Api\SecureTokenManagementApi;
use OpenAPI\Client\Model\TokenRequest;
use OpenAPI\Client\Model\SecureTokenLinkRequest;
use OpenAPI\Client\ApiException;


use Exception;

class TokensController extends Controller
{
    protected $apiInstance;

    public function __construct(SecureTokenManagementApi $apiInstance)
    {
        $this->apiInstance = $apiInstance;
    }

    public function handleTokensDeactivate()
    {
        $path = 'requests/SecureTokensDeactivate.json';
        $payload = json_decode(file_get_contents($path), true);
        $token_request = new TokenRequest( $payload );
        
        try {
            $result = $this->apiInstance->secureTokensActivationsDeleteWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $token_request
            );
            return "Deactivated";
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleTokensDetails()
    {
        $path = 'requests/SecureTokenLinkDetail.json';
        $payload = json_decode(file_get_contents($path), true);

        $token_request = new SecureTokenLinkRequest( $payload );
        
        try {
            $result = $this->apiInstance->secureTokensDetailsPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $token_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }
}
