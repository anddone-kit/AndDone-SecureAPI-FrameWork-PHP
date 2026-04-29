<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAPI\Client\Api\SecurePaymentsApi;
use OpenAPI\Client\Model\PaymentRequest;
use OpenAPI\Client\Model\SecurePaymentDetailsRequest;
use OpenAPI\Client\ApiException;

class SecurePaymentsController extends Controller
{
    protected $apiInstance;

    public function __construct(SecurePaymentsApi $apiInstance)
    {
        $this->apiInstance = $apiInstance;
    }

    public function handleSecurePayment()
    {
        $path = 'requests/SecurePayments.json';
        $payload = json_decode(file_get_contents($path), true);

        $payment_request = new PaymentRequest( $payload );
        try {
            $result = $this->apiInstance->securePaymentsPostWithHttpInfo(
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

    public function handleSecurePaymentSearch()
    {
        $path = 'requests/SecurePaymentsSearch.json';
        $payload = json_decode(file_get_contents($path), true);
        $startRow = $payload["StartRow"];
        $endDate = $payload["EndDate"];
        $startDate = $payload["StartDate"];
        $pageSize = $payload["PageSize"];

        $admin_transaction_search_criteria = "StartRow=" . strval($startRow) . "&EndDate=" . $endDate .
           "&StartDate=" . $startDate;
        $page_info = NULL;
        $adminTransactionSearchCriteria = array(
           "StartRow" => $startRow,
            "StartDate" => $startDate,
            "EndDate" => $endDate
        );

        try {
            $result = $this->apiInstance->securePaymentsSearchPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $startDate,
                $endDate,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                $startRow,
                $pageSize,
                null
            );
            return $result[0]['data'];
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleSecurePaymentExport()
    {
        $path = 'requests/SecurePaymentsExport.json';
        $payload = json_decode(file_get_contents($path), true);
        $startRow = $payload["StartRow"];
        $endDate = $payload["EndDate"];
        $startDate = $payload["StartDate"];

        $admin_transaction_search_criteria = "StartRow=" . strval($startRow) . "&EndDate=" . $endDate .
           "&StartDate=" . $startDate;
        $page_info = NULL;
        
        try {
            $result = $this->apiInstance->securePaymentsExportPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $startDate,
                $endDate,
                exportToCsv: "true"
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleSecurePaymentDetailsById()
    {
        $path = 'requests/SecurePaymentsDetailsById.json';
        $payload = json_decode(file_get_contents($path), true);

        $secure_payment_details_request = new SecurePaymentDetailsRequest( $payload );
        
        try {
            $result = $this->apiInstance->securePaymentsdetailsPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $secure_payment_details_request
            );
            
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

    public function handleSecurePaymentDetailsByToken()
    {
        $path = 'requests/SecurePaymentsDetailsByToken.json';
        $payload = json_decode(file_get_contents($path), true);

        $secure_payment_details_request = new SecurePaymentDetailsRequest( $payload );
        try {
            $result = $this->apiInstance->securePaymentsdetailsPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $secure_payment_details_request
            );
            
            return $result[0];
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

}