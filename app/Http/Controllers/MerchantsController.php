<?php

namespace App\Http\Controllers;

use OpenAPI\Client\ApiException;
use OpenAPI\Client\Api\SecureVendorManagementApi;
use OpenAPI\Client\Model\VendorRequestDTO;
use OpenAPI\Client\Model\SecureVendorRequestDTO;
use OpenAPI\Client\Model\SecureVendorStatusRequestDTO;
use OpenAPI\Client\Model\SecureVendorTimelineRequestDTO;
use OpenAPI\Client\Model\SecureVendorUpdateRequestDTO;

class MerchantsController extends Controller
{
    protected $apiInstance;

    public function __construct(SecureVendorManagementApi $apiInstance)
    {
        $this->apiInstance = $apiInstance;
        $config = $this->apiInstance->getConfig();
        $config->setHost('https://api2.uat.anddone.com');
    }

    public function handleMerchantCreate()
    {
        $path = 'requests/SecureMerchantsVendorCreate.json';
        $payload = json_decode(file_get_contents($path), true);
        
        $create_request = new VendorRequestDTO($payload);
        
        try {
            $result = $this->apiInstance->vendorapiSecureMerchantsVendorsPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $create_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleMerchantDetails()
    {
        $path = 'requests/SecureMerchantsVendorDetails.json';
        $payload = json_decode(file_get_contents($path), true);
        
        $details_request = new SecureVendorRequestDTO($payload);
        
        try {
            $result = $this->apiInstance->vendorapiSecureMerchantsVendorsDetailsPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $details_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleMerchantSearch()
    {
        $path = 'requests/SecureMerchantsVendorSearch.json';
        $payload = json_decode(file_get_contents($path), true);
        
        //$details_request = new SecureVendorRequestDTO($payload);
        
        try {
            $result = $this->apiInstance->vendorapiSecureMerchantsVendorsSearchPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'),
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleMerchantSuspend()
    {
        $path = 'requests/SecureMerchantsVendorSuspend.json';
        $payload = json_decode(file_get_contents($path), true);
        $suspend_request = new SecureVendorStatusRequestDTO($payload);
        
        try {
            $result = $this->apiInstance->vendorapiSecureMerchantsVendorsSuspendPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'),
                $suspend_request
            );
            return "Suspended";
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleMerchantUnsuspend()
    {
        $path = 'requests/SecureMerchantsVendorUnsuspend.json';
        $payload = json_decode(file_get_contents($path), true);
        $unsuspend_request = new SecureVendorStatusRequestDTO($payload);
        
        try {
            $result = $this->apiInstance->vendorapiSecureMerchantsVendorsUnsuspendPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'),
                $unsuspend_request
            );
            return "UnSuspended";
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleMerchantDelete()
    {
        $path = 'requests/SecureMerchantsVendorDelete.json';
        $payload = json_decode(file_get_contents($path), true);
        $delete_request = new SecureVendorStatusRequestDTO($payload);
        
        try {
            $result = $this->apiInstance->vendorapiSecureMerchantsVendorsDeletePostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'),
                $delete_request
            );
            return "Deleted";
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleMerchantTimeline()
    {
        $path = 'requests/SecureMerchantsVendorTimeline.json';
        $payload = json_decode(file_get_contents($path), true);
        $timeline_request = new SecureVendorTimelineRequestDTO($payload);
        
        try {
            $result = $this->apiInstance->vendorapiSecureMerchantsVendorsTimelinePostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'),
                $timeline_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleMerchantEdit()
    {
        $path = 'requests/SecureMerchantsVendorEdit.json';
        $payload = json_decode(file_get_contents($path), true);
        $edit_request = new SecureVendorUpdateRequestDTO($payload);
        
        try {
            $result = $this->apiInstance->vendorapiSecureMerchantsVendorsEditPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'),
                $edit_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

}
