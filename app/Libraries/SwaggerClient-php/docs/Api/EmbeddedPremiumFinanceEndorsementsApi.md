# OpenAPI\Client\EmbeddedPremiumFinanceEndorsementsApi

All URIs are relative to https://api.uat.anddone.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**secureEpfEndorsementsPost()**](EmbeddedPremiumFinanceEndorsementsApi.md#secureEpfEndorsementsPost) | **POST** /secure/epf/endorsements | This API will do a check of eligibility of account |
| [**secureEpfQuoteEndorsementBookingPut()**](EmbeddedPremiumFinanceEndorsementsApi.md#secureEpfQuoteEndorsementBookingPut) | **PUT** /secure/epf/quote/endorsement/booking | This API will update PFA to book a endorsement quote. |
| [**secureEpfQuoteEndorsementPost()**](EmbeddedPremiumFinanceEndorsementsApi.md#secureEpfQuoteEndorsementPost) | **POST** /secure/epf/quote/endorsement | This API will do return a quote for an existing policy or new policy for an existing account |


## `secureEpfEndorsementsPost()`

```php
secureEpfEndorsementsPost($xApiKey, $xAppKey, $origin, $xVersion, $checkEndorsementsRequest): \OpenAPI\Client\Model\PFCheckEndorsementResponse
```

This API will do a check of eligibility of account

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


$apiInstance = new OpenAPI\Client\Api\EmbeddedPremiumFinanceEndorsementsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$checkEndorsementsRequest = new \OpenAPI\Client\Model\PFCheckEndorsementsRequest(); // \OpenAPI\Client\Model\PFCheckEndorsementsRequest | PF Check Endorsement Request details

try {
    $result = $apiInstance->secureEpfEndorsementsPost($xApiKey, $xAppKey, $origin, $xVersion, $checkEndorsementsRequest);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmbeddedPremiumFinanceEndorsementsApi->secureEpfEndorsementsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **checkEndorsementsRequest** | [**\OpenAPI\Client\Model\PFCheckEndorsementsRequest**](../Model/PFCheckEndorsementsRequest.md)| PF Check Endorsement Request details | [optional] |

### Return type

[**\OpenAPI\Client\Model\PFCheckEndorsementResponse**](../Model/PFCheckEndorsementResponse.md)

### Authorization

[Origin](../../README.md#Origin), [x-api-key](../../README.md#x-api-key), [x-app-key](../../README.md#x-app-key)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `secureEpfQuoteEndorsementBookingPut()`

```php
secureEpfQuoteEndorsementBookingPut($xApiKey, $xAppKey, $origin, $xVersion, $updatePFARequest)
```

This API will update PFA to book a endorsement quote.

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


$apiInstance = new OpenAPI\Client\Api\EmbeddedPremiumFinanceEndorsementsApi(
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
    $apiInstance->secureEpfQuoteEndorsementBookingPut($xApiKey, $xAppKey, $origin, $xVersion, $updatePFARequest);
} catch (Exception $e) {
    echo 'Exception when calling EmbeddedPremiumFinanceEndorsementsApi->secureEpfQuoteEndorsementBookingPut: ', $e->getMessage(), PHP_EOL;
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

## `secureEpfQuoteEndorsementPost()`

```php
secureEpfQuoteEndorsementPost($xApiKey, $xAppKey, $origin, $xVersion, $endorsementRequest): \OpenAPI\Client\Model\PFEndorsementResponse
```

This API will do return a quote for an existing policy or new policy for an existing account

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


$apiInstance = new OpenAPI\Client\Api\EmbeddedPremiumFinanceEndorsementsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$endorsementRequest = new \OpenAPI\Client\Model\PFEndorsementRequest(); // \OpenAPI\Client\Model\PFEndorsementRequest | PF Endorsement Request details

try {
    $result = $apiInstance->secureEpfQuoteEndorsementPost($xApiKey, $xAppKey, $origin, $xVersion, $endorsementRequest);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmbeddedPremiumFinanceEndorsementsApi->secureEpfQuoteEndorsementPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **endorsementRequest** | [**\OpenAPI\Client\Model\PFEndorsementRequest**](../Model/PFEndorsementRequest.md)| PF Endorsement Request details | [optional] |

### Return type

[**\OpenAPI\Client\Model\PFEndorsementResponse**](../Model/PFEndorsementResponse.md)

### Authorization

[Origin](../../README.md#Origin), [x-api-key](../../README.md#x-api-key), [x-app-key](../../README.md#x-app-key)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
