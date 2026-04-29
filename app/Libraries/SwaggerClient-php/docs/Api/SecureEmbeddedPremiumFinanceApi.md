# OpenAPI\Client\SecureEmbeddedPremiumFinanceApi

All URIs are relative to https://api.uat.anddone.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**secureEpfQuotesBookingPut()**](SecureEmbeddedPremiumFinanceApi.md#secureEpfQuotesBookingPut) | **PUT** /secure/epf/quotes/booking | This API will update PFA to book a quote. |
| [**secureEpfQuotesCaptureesignPut()**](SecureEmbeddedPremiumFinanceApi.md#secureEpfQuotesCaptureesignPut) | **PUT** /secure/epf/quotes/captureesign | This API will eSign the pfa with insured name. |
| [**secureEpfQuotesGeneratePost()**](SecureEmbeddedPremiumFinanceApi.md#secureEpfQuotesGeneratePost) | **POST** /secure/epf/quotes/generate | This API is used to Generate Quotes |
| [**secureEpfQuotesIntentPost()**](SecureEmbeddedPremiumFinanceApi.md#secureEpfQuotesIntentPost) | **POST** /secure/epf/quotes/intent | This API will return quotes created againsts a payment intent. |
| [**secureEpfQuotesPost()**](SecureEmbeddedPremiumFinanceApi.md#secureEpfQuotesPost) | **POST** /secure/epf/quotes | This API will return quote by QuoteKey. |
| [**secureEpfRetrievepfaPost()**](SecureEmbeddedPremiumFinanceApi.md#secureEpfRetrievepfaPost) | **POST** /secure/epf/retrievepfa | This API will return PFA for given quoteKey. |
| [**secureMerchantsEpfQuotesPolicyPut()**](SecureEmbeddedPremiumFinanceApi.md#secureMerchantsEpfQuotesPolicyPut) | **PUT** /secure/merchants/epf/quotes/policy | This API is will update the policy number |


## `secureEpfQuotesBookingPut()`

```php
secureEpfQuotesBookingPut($xApiKey, $xAppKey, $origin, $xVersion, $updatePFARequest)
```

This API will update PFA to book a quote.

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


$apiInstance = new OpenAPI\Client\Api\SecureEmbeddedPremiumFinanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$updatePFARequest = new \OpenAPI\Client\Model\PFUpdatePFARequestDTO(); // \OpenAPI\Client\Model\PFUpdatePFARequestDTO | Update PFA Request

try {
    $apiInstance->secureEpfQuotesBookingPut($xApiKey, $xAppKey, $origin, $xVersion, $updatePFARequest);
} catch (Exception $e) {
    echo 'Exception when calling SecureEmbeddedPremiumFinanceApi->secureEpfQuotesBookingPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **updatePFARequest** | [**\OpenAPI\Client\Model\PFUpdatePFARequestDTO**](../Model/PFUpdatePFARequestDTO.md)| Update PFA Request | [optional] |

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

## `secureEpfQuotesCaptureesignPut()`

```php
secureEpfQuotesCaptureesignPut($xApiKey, $xAppKey, $origin, $xVersion, $pFQuoteEsignRequest)
```

This API will eSign the pfa with insured name.

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


$apiInstance = new OpenAPI\Client\Api\SecureEmbeddedPremiumFinanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$pFQuoteEsignRequest = new \OpenAPI\Client\Model\PFQuoteEsignRequest(); // \OpenAPI\Client\Model\PFQuoteEsignRequest | PFQuote Request

try {
    $apiInstance->secureEpfQuotesCaptureesignPut($xApiKey, $xAppKey, $origin, $xVersion, $pFQuoteEsignRequest);
} catch (Exception $e) {
    echo 'Exception when calling SecureEmbeddedPremiumFinanceApi->secureEpfQuotesCaptureesignPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **pFQuoteEsignRequest** | [**\OpenAPI\Client\Model\PFQuoteEsignRequest**](../Model/PFQuoteEsignRequest.md)| PFQuote Request | |

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

## `secureEpfQuotesGeneratePost()`

```php
secureEpfQuotesGeneratePost($xApiKey, $xAppKey, $origin, $xVersion, $quoteRequest)
```

This API is used to Generate Quotes

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


$apiInstance = new OpenAPI\Client\Api\SecureEmbeddedPremiumFinanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$quoteRequest = array('key' => new \stdClass); // object | Quote Request

try {
    $apiInstance->secureEpfQuotesGeneratePost($xApiKey, $xAppKey, $origin, $xVersion, $quoteRequest);
} catch (Exception $e) {
    echo 'Exception when calling SecureEmbeddedPremiumFinanceApi->secureEpfQuotesGeneratePost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **quoteRequest** | **object**| Quote Request | |

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

## `secureEpfQuotesIntentPost()`

```php
secureEpfQuotesIntentPost($xApiKey, $xAppKey, $origin, $xVersion, $quoteRequest): object
```

This API will return quotes created againsts a payment intent.

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


$apiInstance = new OpenAPI\Client\Api\SecureEmbeddedPremiumFinanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$quoteRequest = new \OpenAPI\Client\Model\GetQuoteRequest(); // \OpenAPI\Client\Model\GetQuoteRequest | Signature Request details

try {
    $result = $apiInstance->secureEpfQuotesIntentPost($xApiKey, $xAppKey, $origin, $xVersion, $quoteRequest);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecureEmbeddedPremiumFinanceApi->secureEpfQuotesIntentPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **quoteRequest** | [**\OpenAPI\Client\Model\GetQuoteRequest**](../Model/GetQuoteRequest.md)| Signature Request details | |

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

## `secureEpfQuotesPost()`

```php
secureEpfQuotesPost($xApiKey, $xAppKey, $origin, $xVersion, $quoteRequest): object
```

This API will return quote by QuoteKey.

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


$apiInstance = new OpenAPI\Client\Api\SecureEmbeddedPremiumFinanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$quoteRequest = new \OpenAPI\Client\Model\QuoteRequest(); // \OpenAPI\Client\Model\QuoteRequest | Signature Request details

try {
    $result = $apiInstance->secureEpfQuotesPost($xApiKey, $xAppKey, $origin, $xVersion, $quoteRequest);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecureEmbeddedPremiumFinanceApi->secureEpfQuotesPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **quoteRequest** | [**\OpenAPI\Client\Model\QuoteRequest**](../Model/QuoteRequest.md)| Signature Request details | [optional] |

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

## `secureEpfRetrievepfaPost()`

```php
secureEpfRetrievepfaPost($xApiKey, $xAppKey, $origin, $xVersion, $retrievePFARequest): object
```

This API will return PFA for given quoteKey.

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


$apiInstance = new OpenAPI\Client\Api\SecureEmbeddedPremiumFinanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$retrievePFARequest = new \OpenAPI\Client\Model\PFRetrievePFARequest(); // \OpenAPI\Client\Model\PFRetrievePFARequest | PFRetrieve PFA Request

try {
    $result = $apiInstance->secureEpfRetrievepfaPost($xApiKey, $xAppKey, $origin, $xVersion, $retrievePFARequest);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecureEmbeddedPremiumFinanceApi->secureEpfRetrievepfaPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **retrievePFARequest** | [**\OpenAPI\Client\Model\PFRetrievePFARequest**](../Model/PFRetrievePFARequest.md)| PFRetrieve PFA Request | |

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

## `secureMerchantsEpfQuotesPolicyPut()`

```php
secureMerchantsEpfQuotesPolicyPut($xApiKey, $xAppKey, $origin, $xVersion, $parentId, $policyUpdateRequest)
```

This API is will update the policy number

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


$apiInstance = new OpenAPI\Client\Api\SecureEmbeddedPremiumFinanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$parentId = 'parentId_example'; // string | Merchant identifier
$policyUpdateRequest = new \OpenAPI\Client\Model\PFPolicyUpdateRequestDTO(); // \OpenAPI\Client\Model\PFPolicyUpdateRequestDTO | PFPolicyUpdateRequest DTO

try {
    $apiInstance->secureMerchantsEpfQuotesPolicyPut($xApiKey, $xAppKey, $origin, $xVersion, $parentId, $policyUpdateRequest);
} catch (Exception $e) {
    echo 'Exception when calling SecureEmbeddedPremiumFinanceApi->secureMerchantsEpfQuotesPolicyPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **parentId** | **string**| Merchant identifier | |
| **policyUpdateRequest** | [**\OpenAPI\Client\Model\PFPolicyUpdateRequestDTO**](../Model/PFPolicyUpdateRequestDTO.md)| PFPolicyUpdateRequest DTO | |

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
