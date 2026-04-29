<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAPI\Client\Model\ReportDownloadRequest;
use OpenAPI\Client\ApiException;
use Exception;
use OpenAPI\Client\Api\SecureReportsApi;

class ReportsController extends Controller
{
    protected $apiInstance;

    public function __construct(SecureReportsApi $apiInstance)
    {
        
        $this->apiInstance = $apiInstance;
    }

    public function handleReportsDownload()
    {
        $path = 'requests/SecureReportsDownload.json';
        $payload = json_decode(file_get_contents($path), true);
        
        $report_request = new ReportDownloadRequest($payload);
        
        try {
            $result = $this->apiInstance->secureReportsDownloadsPostWithHttpInfo(
                config('sdk.api_key'), 
                config('sdk.app_key'), 
                config('sdk.version'), 
                config('sdk.origin'), 
                $report_request
            );
            return $result;
        } catch (ApiException $e) {
            return $e->getResponseBody();  
        }
    }

}
