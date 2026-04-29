# OpenAPI\Client\SecureRefundsApi

All URIs are relative to https://api.uat.anddone.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**secureRefundsEligibilityPost()**](SecureRefundsApi.md#secureRefundsEligibilityPost) | **POST** /secure/refunds/eligibility | This API return refund eligibility of a transaction. |
| [**secureRefundsPost()**](SecureRefundsApi.md#secureRefundsPost) | **POST** /secure/refunds | This API return refund a transaction. |


## `secureRefundsEligibilityPost()`

```php
secureRefundsEligibilityPost($xApiKey, $xAppKey, $origin, $xVersion, $transactionRefundEligibilityRequest): \OpenAPI\Client\Model\RefundEligibility
```

This API return refund eligibility of a transaction.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: Origin
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKey('Origin', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Origin', 'Bearer');

// Configure API key authorization: x-api-key
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

// Configure API key authorization: x-app-key
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKey('x-app-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-app-key', 'Bearer');


$apiInstance = new OpenAPI\Client\Api\SecureRefundsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$transactionRefundEligibilityRequest = new \OpenAPI\Client\Model\TransactionRefundEligibilityRequest(); // \OpenAPI\Client\Model\TransactionRefundEligibilityRequest | refund Detail

try {
    $result = $apiInstance->secureRefundsEligibilityPost($xApiKey, $xAppKey, $origin, $xVersion, $transactionRefundEligibilityRequest);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecureRefundsApi->secureRefundsEligibilityPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **transactionRefundEligibilityRequest** | [**\OpenAPI\Client\Model\TransactionRefundEligibilityRequest**](../Model/TransactionRefundEligibilityRequest.md)| refund Detail | |

### Return type

[**\OpenAPI\Client\Model\RefundEligibility**](../Model/RefundEligibility.md)

### Authorization

[Origin](../../README.md#Origin), [x-api-key](../../README.md#x-api-key), [x-app-key](../../README.md#x-app-key)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `secureRefundsPost()`

```php
secureRefundsPost($xApiKey, $xAppKey, $origin, $xVersion, $transactionRefundRequest): \OpenAPI\Client\Model\TransactionResponse
```

This API return refund a transaction.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: Origin
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKey('Origin', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Origin', 'Bearer');

// Configure API key authorization: x-api-key
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

// Configure API key authorization: x-app-key
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKey('x-app-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-app-key', 'Bearer');


$apiInstance = new OpenAPI\Client\Api\SecureRefundsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$transactionRefundRequest = new \OpenAPI\Client\Model\TransactionRefundRequest(); // \OpenAPI\Client\Model\TransactionRefundRequest | refund Detail

try {
    $result = $apiInstance->secureRefundsPost($xApiKey, $xAppKey, $origin, $xVersion, $transactionRefundRequest);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecureRefundsApi->secureRefundsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **transactionRefundRequest** | [**\OpenAPI\Client\Model\TransactionRefundRequest**](../Model/TransactionRefundRequest.md)| refund Detail | |

### Return type

[**\OpenAPI\Client\Model\TransactionResponse**](../Model/TransactionResponse.md)

### Authorization

[Origin](../../README.md#Origin), [x-api-key](../../README.md#x-api-key), [x-app-key](../../README.md#x-app-key)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
