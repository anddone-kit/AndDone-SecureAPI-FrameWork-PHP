# OpenAPI\Client\SecurePaymentLinksApi

All URIs are relative to https://api.uat.anddone.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**securePaymentlinksDetailsPost()**](SecurePaymentLinksApi.md#securePaymentlinksDetailsPost) | **POST** /secure/paymentlinks/details | This API is used for getting Payment Links by PaymentLink ID |
| [**securePaymentlinksExpirationsPost()**](SecurePaymentLinksApi.md#securePaymentlinksExpirationsPost) | **POST** /secure/paymentlinks/expirations | This API is used for to set expired payment link |
| [**securePaymentlinksIdPut()**](SecurePaymentLinksApi.md#securePaymentlinksIdPut) | **PUT** /secure/paymentlinks/{id} | This API is used to update Payment Links |
| [**securePaymentlinksPost()**](SecurePaymentLinksApi.md#securePaymentlinksPost) | **POST** /secure/paymentlinks | This API is used to create Payment Links |


## `securePaymentlinksDetailsPost()`

```php
securePaymentlinksDetailsPost($xApiKey, $xAppKey, $origin, $xVersion, $securePaymentLinkRequest): \OpenAPI\Client\Model\PaymentLinkResponse
```

This API is used for getting Payment Links by PaymentLink ID

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


$apiInstance = new OpenAPI\Client\Api\SecurePaymentLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$securePaymentLinkRequest = new \OpenAPI\Client\Model\SecurePaymentLinkRequest(); // \OpenAPI\Client\Model\SecurePaymentLinkRequest | Secure Payment Link Request

try {
    $result = $apiInstance->securePaymentlinksDetailsPost($xApiKey, $xAppKey, $origin, $xVersion, $securePaymentLinkRequest);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecurePaymentLinksApi->securePaymentlinksDetailsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **securePaymentLinkRequest** | [**\OpenAPI\Client\Model\SecurePaymentLinkRequest**](../Model/SecurePaymentLinkRequest.md)| Secure Payment Link Request | |

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

## `securePaymentlinksExpirationsPost()`

```php
securePaymentlinksExpirationsPost($xApiKey, $xAppKey, $origin, $xVersion, $securePaymentLinkRequest): \OpenAPI\Client\Model\PaymentIntentExpiresResponse
```

This API is used for to set expired payment link

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


$apiInstance = new OpenAPI\Client\Api\SecurePaymentLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$securePaymentLinkRequest = new \OpenAPI\Client\Model\SecurePaymentLinkRequest(); // \OpenAPI\Client\Model\SecurePaymentLinkRequest | Secure Payment Link Request

try {
    $result = $apiInstance->securePaymentlinksExpirationsPost($xApiKey, $xAppKey, $origin, $xVersion, $securePaymentLinkRequest);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecurePaymentLinksApi->securePaymentlinksExpirationsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **securePaymentLinkRequest** | [**\OpenAPI\Client\Model\SecurePaymentLinkRequest**](../Model/SecurePaymentLinkRequest.md)| Secure Payment Link Request | |

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

## `securePaymentlinksIdPut()`

```php
securePaymentlinksIdPut($xApiKey, $xAppKey, $origin, $xVersion, $id, $paymentLinkRequest): \OpenAPI\Client\Model\PaymentLinkResponse
```

This API is used to update Payment Links

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


$apiInstance = new OpenAPI\Client\Api\SecurePaymentLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$id = 'id_example'; // string | PaymentLink identifier
$paymentLinkRequest = new \OpenAPI\Client\Model\PaymentLinkRequest(); // \OpenAPI\Client\Model\PaymentLinkRequest | Payment Link Request

try {
    $result = $apiInstance->securePaymentlinksIdPut($xApiKey, $xAppKey, $origin, $xVersion, $id, $paymentLinkRequest);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecurePaymentLinksApi->securePaymentlinksIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **id** | **string**| PaymentLink identifier | |
| **paymentLinkRequest** | [**\OpenAPI\Client\Model\PaymentLinkRequest**](../Model/PaymentLinkRequest.md)| Payment Link Request | |

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

## `securePaymentlinksPost()`

```php
securePaymentlinksPost($xApiKey, $xAppKey, $origin, $xVersion, $paymentLinkRequest): \OpenAPI\Client\Model\PaymentLinkResponse
```

This API is used to create Payment Links

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


$apiInstance = new OpenAPI\Client\Api\SecurePaymentLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$paymentLinkRequest = new \OpenAPI\Client\Model\PaymentLinkRequest(); // \OpenAPI\Client\Model\PaymentLinkRequest | Payment Link Request

try {
    $result = $apiInstance->securePaymentlinksPost($xApiKey, $xAppKey, $origin, $xVersion, $paymentLinkRequest);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecurePaymentLinksApi->securePaymentlinksPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **paymentLinkRequest** | [**\OpenAPI\Client\Model\PaymentLinkRequest**](../Model/PaymentLinkRequest.md)| Payment Link Request | |

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
