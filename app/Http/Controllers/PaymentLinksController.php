<?php

namespace App\Http\Controllers;

use OpenAPI\Client\Api\SecurePaymentLinksApi;
use OpenAPI\Client\Model\SecurePaymentLinkRequest;
use OpenAPI\Client\Model\PaymentLinkRequest;
use OpenAPI\Client\ApiException;
//use OpenAPI\Client\Model\SecurePaymentLinkRequest;
//use OpenAPI\Client\Model\SecurePaymentLinkRequest;

class PaymentLinksController extends Controller
{
    protected $apiInstance;

    public function __construct(SecurePaymentLinksApi $apiInstance)
    {
        $this->apiInstance = $apiInstance;
    }

    public function handleSecurePaymentLinksDetails()
    {
        $path = 'requests/SecurePaymentLinkDetail.json';
        $payload = json_decode(file_get_contents($path), true);
        
        $secure_payment_link_request = new SecurePaymentLinkRequest( $payload );
        
        try {
            $result = $this->apiInstance->securePaymentlinksDetailsPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $secure_payment_link_request
            );
            
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleSecurePaymentLinks()    
    {
        $path = 'requests/SecurePaymentLinkCreate.json';
        $payload = json_decode(file_get_contents($path), true);

        $payment_link_request = new PaymentLinkRequest( $payload );
        
        try {
            $result = $this->apiInstance->securePaymentlinksPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $payment_link_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleSecurePaymentLinksExpirations()    
    {
        $path = 'requests/SecurePaymentLinkExpiration.json';
        $payload = json_decode(file_get_contents($path), true);

        $secure_payment_link_request = new SecurePaymentLinkRequest( $payload );
        
        try {
            $result = $this->apiInstance->securePaymentlinksExpirationsPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $secure_payment_link_request
            );
            
            return $result[0];
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleSecurePaymentLinksUpdate()    
    {
        $path = 'requests/SecurePaymentLinkUpdate.json';
        $payload = json_decode(file_get_contents($path), true);
        $id = $payload["id"];

        $payment_link_request = new PaymentLinkRequest( $payload );
        
        try {
            $result = $this->apiInstance->securePaymentlinksIdPutWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $id,
                $payment_link_request
            );
            
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

}
