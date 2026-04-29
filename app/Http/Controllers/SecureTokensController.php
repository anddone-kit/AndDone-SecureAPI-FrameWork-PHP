<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAPI\Client\Api\SecureTokenLinksApi;
use OpenAPI\Client\Model\TokenLinkSecureRequest;
use OpenAPI\Client\Model\SecureTokenLinkRequest;
use OpenAPI\Client\Model\SecureTokenLinkIdRequest;
use OpenAPI\Client\Model\SecureTokenLinkUpdateRequest;
use OpenAPI\Client\Model\TokenLinkSearchCriteria;
use OpenAPI\Client\ApiException;


use Exception;

class SecureTokensController extends Controller
{
    protected $apiInstance;

    public function __construct(SecureTokenLinksApi $apiInstance)
    {
        $this->apiInstance = $apiInstance;
    }

    public function handleSecureTokenLinks()
    {
        $path = 'requests/SecureTokenLinkCreate.json';
        $payload = json_decode(file_get_contents($path), true);

        $secure_token_link_request = new TokenLinkSecureRequest( $payload );
        
        try {
            $result = $this->apiInstance->secureTokenlinksPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $secure_token_link_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleSecureTokenLinksDetails()
    {
        $path = 'requests/SecureTokenLinkDetail.json';
        $payload = json_decode(file_get_contents($path), true);

        $secure_token_link_id_request = new SecureTokenLinkRequest( $payload );
        
        try {
            $result = $this->apiInstance->secureTokenlinksDetailsPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $secure_token_link_id_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleSecureTokenLinksUpdate()
    {
        $path = 'requests/SecureTokenLinkUpdate.json';
        $payload = json_decode(file_get_contents($path), true);

        $secure_token_link_update_request = new SecureTokenLinkUpdateRequest( $payload );
        
        try {
            $result = $this->apiInstance->secureTokenlinksPutWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $secure_token_link_update_request
            );
            return "Updated";
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleSecureTokenLinksExpire()
    {
        $path = 'requests/SecureTokenLinkExpire.json';
        $payload = json_decode(file_get_contents($path), true);

        $secure_token_link_id_request = new SecureTokenLinkRequest( $payload );
        
        try {
            $result = $this->apiInstance->secureTokenlinksExpirationsPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $secure_token_link_id_request
            );
            return $result[0];
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleSecureTokenLinksList()
    {
        $path = 'requests/SecureTokenLinkList.json';
        $payload = json_decode(file_get_contents($path), true);

        //$secure_token_link_search_request = new TokenLinkSearchCriteria( $payload );
        
        try {
            $result = $this->apiInstance->secureTokenlinksListPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin')
            );
            return $result[0]['data'];
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }
}
