# OpenAPI\Client\SecureTokenLinksApi

All URIs are relative to https://api.uat.anddone.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**secureTokenlinksDetailsPost()**](SecureTokenLinksApi.md#secureTokenlinksDetailsPost) | **POST** /secure/tokenlinks/details | This API is used for getting Token Links by TokenLink ID |
| [**secureTokenlinksExpirationsPost()**](SecureTokenLinksApi.md#secureTokenlinksExpirationsPost) | **POST** /secure/tokenlinks/expirations | This API expires the token link. |
| [**secureTokenlinksListPost()**](SecureTokenLinksApi.md#secureTokenlinksListPost) | **POST** /secure/tokenlinks/list | This API is used for getting all Token Links for Merchant |
| [**secureTokenlinksPost()**](SecureTokenLinksApi.md#secureTokenlinksPost) | **POST** /secure/tokenlinks | This API is use to create Secure Token Links |
| [**secureTokenlinksPut()**](SecureTokenLinksApi.md#secureTokenlinksPut) | **PUT** /secure/tokenlinks | This API will update the expireIn and paymentType of Token Link. |
| [**secureTokensDetailsPost()**](SecureTokenLinksApi.md#secureTokensDetailsPost) | **POST** /secure/tokens/details | This API is used for getting details of Token Link |


## `secureTokenlinksDetailsPost()`

```php
secureTokenlinksDetailsPost($xApiKey, $xAppKey, $origin, $xVersion, $secureTokenLinkIdRequest): \OpenAPI\Client\Model\TokenLinkByIdResponse
```

This API is used for getting Token Links by TokenLink ID

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


$apiInstance = new OpenAPI\Client\Api\SecureTokenLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$secureTokenLinkIdRequest = new \OpenAPI\Client\Model\SecureTokenLinkIdRequest(); // \OpenAPI\Client\Model\SecureTokenLinkIdRequest | Secure Token Link Id Request

try {
    $result = $apiInstance->secureTokenlinksDetailsPost($xApiKey, $xAppKey, $origin, $xVersion, $secureTokenLinkIdRequest);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecureTokenLinksApi->secureTokenlinksDetailsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **secureTokenLinkIdRequest** | [**\OpenAPI\Client\Model\SecureTokenLinkIdRequest**](../Model/SecureTokenLinkIdRequest.md)| Secure Token Link Id Request | |

### Return type

[**\OpenAPI\Client\Model\TokenLinkByIdResponse**](../Model/TokenLinkByIdResponse.md)

### Authorization

[Origin](../../README.md#Origin), [x-api-key](../../README.md#x-api-key), [x-app-key](../../README.md#x-app-key)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `secureTokenlinksExpirationsPost()`

```php
secureTokenlinksExpirationsPost($xApiKey, $xAppKey, $origin, $xVersion, $secureTokenLinkIdRequest): object
```

This API expires the token link.

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


$apiInstance = new OpenAPI\Client\Api\SecureTokenLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$secureTokenLinkIdRequest = new \OpenAPI\Client\Model\SecureTokenLinkIdRequest(); // \OpenAPI\Client\Model\SecureTokenLinkIdRequest | Secure Token Link Id Request

try {
    $result = $apiInstance->secureTokenlinksExpirationsPost($xApiKey, $xAppKey, $origin, $xVersion, $secureTokenLinkIdRequest);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecureTokenLinksApi->secureTokenlinksExpirationsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **secureTokenLinkIdRequest** | [**\OpenAPI\Client\Model\SecureTokenLinkIdRequest**](../Model/SecureTokenLinkIdRequest.md)| Secure Token Link Id Request | |

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

## `secureTokenlinksListPost()`

```php
secureTokenlinksListPost($xApiKey, $xAppKey, $origin, $xVersion, $tokenLinkSearchCriteria, $pageInfo): \OpenAPI\Client\Model\TokenLinkResponse
```

This API is used for getting all Token Links for Merchant

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


$apiInstance = new OpenAPI\Client\Api\SecureTokenLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$tokenLinkSearchCriteria = NULL; // mixed | Token Link search criteria
$pageInfo = NULL; // mixed | Set Page Info

try {
    $result = $apiInstance->secureTokenlinksListPost($xApiKey, $xAppKey, $origin, $xVersion, $tokenLinkSearchCriteria, $pageInfo);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecureTokenLinksApi->secureTokenlinksListPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **tokenLinkSearchCriteria** | [**mixed**](../Model/.md)| Token Link search criteria | [optional] |
| **pageInfo** | [**mixed**](../Model/.md)| Set Page Info | [optional] |

### Return type

[**\OpenAPI\Client\Model\TokenLinkResponse**](../Model/TokenLinkResponse.md)

### Authorization

[Origin](../../README.md#Origin), [x-api-key](../../README.md#x-api-key), [x-app-key](../../README.md#x-app-key)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `secureTokenlinksPost()`

```php
secureTokenlinksPost($xApiKey, $xAppKey, $origin, $xVersion, $secureTokenLinkRequest): \OpenAPI\Client\Model\TokenLinkResponse
```

This API is use to create Secure Token Links

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


$apiInstance = new OpenAPI\Client\Api\SecureTokenLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$secureTokenLinkRequest = new \OpenAPI\Client\Model\SecureTokenLinkRequest(); // \OpenAPI\Client\Model\SecureTokenLinkRequest | Secure Token Link Request

try {
    $result = $apiInstance->secureTokenlinksPost($xApiKey, $xAppKey, $origin, $xVersion, $secureTokenLinkRequest);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecureTokenLinksApi->secureTokenlinksPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **secureTokenLinkRequest** | [**\OpenAPI\Client\Model\SecureTokenLinkRequest**](../Model/SecureTokenLinkRequest.md)| Secure Token Link Request | |

### Return type

[**\OpenAPI\Client\Model\TokenLinkResponse**](../Model/TokenLinkResponse.md)

### Authorization

[Origin](../../README.md#Origin), [x-api-key](../../README.md#x-api-key), [x-app-key](../../README.md#x-app-key)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `secureTokenlinksPut()`

```php
secureTokenlinksPut($xApiKey, $xAppKey, $origin, $xVersion, $secureTokenLinkUpdateRequest)
```

This API will update the expireIn and paymentType of Token Link.

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


$apiInstance = new OpenAPI\Client\Api\SecureTokenLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$secureTokenLinkUpdateRequest = new \OpenAPI\Client\Model\SecureTokenLinkUpdateRequest(); // \OpenAPI\Client\Model\SecureTokenLinkUpdateRequest | Secure Token Link Update Request

try {
    $apiInstance->secureTokenlinksPut($xApiKey, $xAppKey, $origin, $xVersion, $secureTokenLinkUpdateRequest);
} catch (Exception $e) {
    echo 'Exception when calling SecureTokenLinksApi->secureTokenlinksPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **secureTokenLinkUpdateRequest** | [**\OpenAPI\Client\Model\SecureTokenLinkUpdateRequest**](../Model/SecureTokenLinkUpdateRequest.md)| Secure Token Link Update Request | |

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

## `secureTokensDetailsPost()`

```php
secureTokensDetailsPost($xApiKey, $xAppKey, $origin, $xVersion, $secureTokenLinkIdRequest): \OpenAPI\Client\Model\MerchantTokenShortResponse
```

This API is used for getting details of Token Link

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


$apiInstance = new OpenAPI\Client\Api\SecureTokenLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$xApiKey = 'xApiKey_example'; // string | an authorization header
$xAppKey = 'xAppKey_example'; // string | an authorization header
$origin = 'origin_example'; // string | an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration
$xVersion = 'xVersion_example'; // string | x-version
$secureTokenLinkIdRequest = new \OpenAPI\Client\Model\SecureTokenLinkIdRequest(); // \OpenAPI\Client\Model\SecureTokenLinkIdRequest | Secure Token Link Id Request

try {
    $result = $apiInstance->secureTokensDetailsPost($xApiKey, $xAppKey, $origin, $xVersion, $secureTokenLinkIdRequest);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SecureTokenLinksApi->secureTokensDetailsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **xApiKey** | **string**| an authorization header | |
| **xAppKey** | **string**| an authorization header | |
| **origin** | **string**| an authorization header. Your origin IP address or URL. Must be configured with AndDone Administration | |
| **xVersion** | **string**| x-version | |
| **secureTokenLinkIdRequest** | [**\OpenAPI\Client\Model\SecureTokenLinkIdRequest**](../Model/SecureTokenLinkIdRequest.md)| Secure Token Link Id Request | |

### Return type

[**\OpenAPI\Client\Model\MerchantTokenShortResponse**](../Model/MerchantTokenShortResponse.md)

### Authorization

[Origin](../../README.md#Origin), [x-api-key](../../README.md#x-api-key), [x-app-key](../../README.md#x-app-key)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
