# OpenAPI\Client\SecurePremiumFinanceLiteApi

All URIs are relative to https://api.uat.anddone.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**secureEpfliteQuotesGeneratePost()**](SecurePremiumFinanceLiteApi.md#secureEpfliteQuotesGeneratePost) | **POST** /secure/epflite/quotes/generate | This API is used to generate the quote from the provider. |
| [**secureEpfliteQuotesLinkPost()**](SecurePremiumFinanceLiteApi.md#secureEpfliteQuotesLinkPost) | **POST** /secure/epflite/quotes/link | This API will return quotes created againsts a payment link. |
| [**secureEpfliteQuotesPaymentlinksPost()**](SecurePremiumFinanceLiteApi.md#secureEpfliteQuotesPaymentlinksPost) | **POST** /secure/epflite/quotes/paymentlinks | This API is used to generate the quote from the provider. |


## `secureEpfliteQuotesGeneratePost()`

```php
secureEpfliteQuotesGeneratePost($xApiKey, $xAppKey, $origin, $xVersion, $pFLiteQuoteSecureRequest)
```

This API is used to generate the quote from the provider.

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


$apiInstance = new OpenAPI\Client\Api\SecurePremiumFinanceLiteApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$pFLiteQuoteSecureRequest = new \OpenAPI\Client\Model\PFLiteSecureQuoteRequest(); // \OpenAPI\Client\Model\PFLiteSecureQuoteRequest | PFLite Quote Secure Request details

try {
    $apiInstance->secureEpfliteQuotesGeneratePost($xApiKey, $xAppKey, $origin, $xVersion, $pFLiteQuoteSecureRequest);
} catch (Exception $e) {
    echo 'Exception when calling SecurePremiumFinanceLiteApi->secureEpfliteQuotesGeneratePost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **pFLiteQuoteSecureRequest** | [**\OpenAPI\Client\Model\PFLiteSecureQuoteRequest**](../Model/PFLiteSecureQuoteRequest.md)| PFLite Quote Secure Request details | |

### Return type

void (empty response body)

### Authorization

[Origin](../../README.md#Origin), [x-api-key](../../README.md#x-api-key), [x-app-key](../../README.md#x-app-key)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `secureEpfliteQuotesLinkPost()`

```php
secureEpfliteQuotesLinkPost($xApiKey, $xAppKey, $origin, $xVersion, $pFLiteGetQuoteRequest): object
```

This API will return quotes created againsts a payment link.

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


$apiInstance = new OpenAPI\Client\Api\SecurePremiumFinanceLiteApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$pFLiteGetQuoteRequest = new \OpenAPI\Client\Model\PFLiteGetQuoteRequest(); // \OpenAPI\Client\Model\PFLiteGetQuoteRequest | Signature Request details

try {
    $result = $apiInstance->secureEpfliteQuotesLinkPost($xApiKey, $xAppKey, $origin, $xVersion, $pFLiteGetQuoteRequest);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecurePremiumFinanceLiteApi->secureEpfliteQuotesLinkPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **pFLiteGetQuoteRequest** | [**\OpenAPI\Client\Model\PFLiteGetQuoteRequest**](../Model/PFLiteGetQuoteRequest.md)| Signature Request details | |

### Return type

**object**

### Authorization

[Origin](../../README.md#Origin), [x-api-key](../../README.md#x-api-key), [x-app-key](../../README.md#x-app-key)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `secureEpfliteQuotesPaymentlinksPost()`

```php
secureEpfliteQuotesPaymentlinksPost($xApiKey, $xAppKey, $origin, $xVersion, $pflitePaymentLinkRequest): \OpenAPI\Client\Model\PaymentLinkResponse
```

This API is used to generate the quote from the provider.

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


$apiInstance = new OpenAPI\Client\Api\SecurePremiumFinanceLiteApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$pflitePaymentLinkRequest = new \OpenAPI\Client\Model\PFLitePaymentLinkRequest(); // \OpenAPI\Client\Model\PFLitePaymentLinkRequest | PFlite PaymentLink Request Details

try {
    $result = $apiInstance->secureEpfliteQuotesPaymentlinksPost($xApiKey, $xAppKey, $origin, $xVersion, $pflitePaymentLinkRequest);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecurePremiumFinanceLiteApi->secureEpfliteQuotesPaymentlinksPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **pflitePaymentLinkRequest** | [**\OpenAPI\Client\Model\PFLitePaymentLinkRequest**](../Model/PFLitePaymentLinkRequest.md)| PFlite PaymentLink Request Details | [optional] |

### Return type

[**\OpenAPI\Client\Model\PaymentLinkResponse**](../Model/PaymentLinkResponse.md)

### Authorization

[Origin](../../README.md#Origin), [x-api-key](../../README.md#x-api-key), [x-app-key](../../README.md#x-app-key)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
