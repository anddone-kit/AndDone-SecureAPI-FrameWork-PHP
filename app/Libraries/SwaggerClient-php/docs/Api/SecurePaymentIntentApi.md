# OpenAPI\Client\SecurePaymentIntentApi

All URIs are relative to https://api.uat.anddone.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**secureEpfUpdateintentPut()**](SecurePaymentIntentApi.md#secureEpfUpdateintentPut) | **PUT** /secure/epf/updateintent | This API is use update the amount of payment intent. |
| [**securePaymentintentsExpirationsididPost()**](SecurePaymentIntentApi.md#securePaymentintentsExpirationsididPost) | **POST** /secure/paymentintents/expirations?id&#x3D;{id} | This API expires the payment Intent or link. |
| [**securePaymentintentsPost()**](SecurePaymentIntentApi.md#securePaymentintentsPost) | **POST** /secure/paymentintents | This API is use to create Secure payment Intent. |


## `secureEpfUpdateintentPut()`

```php
secureEpfUpdateintentPut($xApiKey, $xAppKey, $origin, $xVersion, $updateIntentRequest)
```

This API is use update the amount of payment intent.

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


$apiInstance = new OpenAPI\Client\Api\SecurePaymentIntentApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$updateIntentRequest = new \OpenAPI\Client\Model\UpdateIntentRequest(); // \OpenAPI\Client\Model\UpdateIntentRequest | Update Intent Request

try {
    $apiInstance->secureEpfUpdateintentPut($xApiKey, $xAppKey, $origin, $xVersion, $updateIntentRequest);
} catch (Exception $e) {
    echo 'Exception when calling SecurePaymentIntentApi->secureEpfUpdateintentPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **updateIntentRequest** | [**\OpenAPI\Client\Model\UpdateIntentRequest**](../Model/UpdateIntentRequest.md)| Update Intent Request | |

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

## `securePaymentintentsExpirationsididPost()`

```php
securePaymentintentsExpirationsididPost($xApiKey, $xAppKey, $origin, $xVersion, $id, $paymentIntentExpiresRequest): \OpenAPI\Client\Model\PaymentIntentExpiresResponse
```

This API expires the payment Intent or link.

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


$apiInstance = new OpenAPI\Client\Api\SecurePaymentIntentApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$id = 'id_example'; // string | Payment Intent Id
$paymentIntentExpiresRequest = new \OpenAPI\Client\Model\PaymentIntentExpiresRequest(); // \OpenAPI\Client\Model\PaymentIntentExpiresRequest | Payment Intent Expiration Request

try {
    $result = $apiInstance->securePaymentintentsExpirationsididPost($xApiKey, $xAppKey, $origin, $xVersion, $id, $paymentIntentExpiresRequest);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecurePaymentIntentApi->securePaymentintentsExpirationsididPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **id** | **string**| Payment Intent Id | |
| **paymentIntentExpiresRequest** | [**\OpenAPI\Client\Model\PaymentIntentExpiresRequest**](../Model/PaymentIntentExpiresRequest.md)| Payment Intent Expiration Request | |

### Return type

[**\OpenAPI\Client\Model\PaymentIntentExpiresResponse**](../Model/PaymentIntentExpiresResponse.md)

### Authorization

[Origin](../../README.md#Origin), [x-api-key](../../README.md#x-api-key), [x-app-key](../../README.md#x-app-key)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `securePaymentintentsPost()`

```php
securePaymentintentsPost($xApiKey, $xAppKey, $origin, $xVersion, $paymentIntentRequest): \OpenAPI\Client\Model\PaymentIntentResponse
```

This API is use to create Secure payment Intent.

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


$apiInstance = new OpenAPI\Client\Api\SecurePaymentIntentApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$paymentIntentRequest = new \OpenAPI\Client\Model\PaymentIntentRequest(); // \OpenAPI\Client\Model\PaymentIntentRequest | Payment Intent Request

try {
    $result = $apiInstance->securePaymentintentsPost($xApiKey, $xAppKey, $origin, $xVersion, $paymentIntentRequest);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecurePaymentIntentApi->securePaymentintentsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **paymentIntentRequest** | [**\OpenAPI\Client\Model\PaymentIntentRequest**](../Model/PaymentIntentRequest.md)| Payment Intent Request | |

### Return type

[**\OpenAPI\Client\Model\PaymentIntentResponse**](../Model/PaymentIntentResponse.md)

### Authorization

[Origin](../../README.md#Origin), [x-api-key](../../README.md#x-api-key), [x-app-key](../../README.md#x-app-key)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
