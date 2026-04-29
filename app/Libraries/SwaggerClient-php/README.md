# OpenAPIClient-php

Secure API's


## Installation & Usage

### Requirements

PHP 7.4 and later.
Should also work with PHP 8.0.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/GIT_USER_ID/GIT_REPO_ID.git"
    }
  ],
  "require": {
    "GIT_USER_ID/GIT_REPO_ID": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/OpenAPIClient-php/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

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

## API Endpoints

All URIs are relative to *https://api.uat.anddone.com*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*EmbeddedPremiumFinanceEndorsementsApi* | [**secureEpfEndorsementsPost**](docs/Api/EmbeddedPremiumFinanceEndorsementsApi.md#secureepfendorsementspost) | **POST** /secure/epf/endorsements | This API will do a check of eligibility of account
*EmbeddedPremiumFinanceEndorsementsApi* | [**secureEpfQuoteEndorsementBookingPut**](docs/Api/EmbeddedPremiumFinanceEndorsementsApi.md#secureepfquoteendorsementbookingput) | **PUT** /secure/epf/quote/endorsement/booking | This API will update PFA to book a endorsement quote.
*EmbeddedPremiumFinanceEndorsementsApi* | [**secureEpfQuoteEndorsementPost**](docs/Api/EmbeddedPremiumFinanceEndorsementsApi.md#secureepfquoteendorsementpost) | **POST** /secure/epf/quote/endorsement | This API will do return a quote for an existing policy or new policy for an existing account
*SecureEmbeddedPremiumFinanceApi* | [**secureEpfQuotesBookingPut**](docs/Api/SecureEmbeddedPremiumFinanceApi.md#secureepfquotesbookingput) | **PUT** /secure/epf/quotes/booking | This API will update PFA to book a quote.
*SecureEmbeddedPremiumFinanceApi* | [**secureEpfQuotesCaptureesignPut**](docs/Api/SecureEmbeddedPremiumFinanceApi.md#secureepfquotescaptureesignput) | **PUT** /secure/epf/quotes/captureesign | This API will eSign the pfa with insured name.
*SecureEmbeddedPremiumFinanceApi* | [**secureEpfQuotesGeneratePost**](docs/Api/SecureEmbeddedPremiumFinanceApi.md#secureepfquotesgeneratepost) | **POST** /secure/epf/quotes/generate | This API is used to Generate Quotes
*SecureEmbeddedPremiumFinanceApi* | [**secureEpfQuotesIntentPost**](docs/Api/SecureEmbeddedPremiumFinanceApi.md#secureepfquotesintentpost) | **POST** /secure/epf/quotes/intent | This API will return quotes created againsts a payment intent.
*SecureEmbeddedPremiumFinanceApi* | [**secureEpfQuotesPost**](docs/Api/SecureEmbeddedPremiumFinanceApi.md#secureepfquotespost) | **POST** /secure/epf/quotes | This API will return quote by QuoteKey.
*SecureEmbeddedPremiumFinanceApi* | [**secureEpfRetrievepfaPost**](docs/Api/SecureEmbeddedPremiumFinanceApi.md#secureepfretrievepfapost) | **POST** /secure/epf/retrievepfa | This API will return PFA for given quoteKey.
*SecureEmbeddedPremiumFinanceApi* | [**secureMerchantsEpfQuotesPolicyPut**](docs/Api/SecureEmbeddedPremiumFinanceApi.md#securemerchantsepfquotespolicyput) | **PUT** /secure/merchants/epf/quotes/policy | This API is will update the policy number
*SecurePaymentIntentApi* | [**secureEpfUpdateintentPut**](docs/Api/SecurePaymentIntentApi.md#secureepfupdateintentput) | **PUT** /secure/epf/updateintent | This API is use update the amount of payment intent.
*SecurePaymentIntentApi* | [**securePaymentintentsExpirationsididPost**](docs/Api/SecurePaymentIntentApi.md#securepaymentintentsexpirationsididpost) | **POST** /secure/paymentintents/expirations?id&#x3D;{id} | This API expires the payment Intent or link.
*SecurePaymentIntentApi* | [**securePaymentintentsPost**](docs/Api/SecurePaymentIntentApi.md#securepaymentintentspost) | **POST** /secure/paymentintents | This API is use to create Secure payment Intent.
*SecurePaymentLinksApi* | [**securePaymentlinksDetailsPost**](docs/Api/SecurePaymentLinksApi.md#securepaymentlinksdetailspost) | **POST** /secure/paymentlinks/details | This API is used for getting Payment Links by PaymentLink ID
*SecurePaymentLinksApi* | [**securePaymentlinksExpirationsPost**](docs/Api/SecurePaymentLinksApi.md#securepaymentlinksexpirationspost) | **POST** /secure/paymentlinks/expirations | This API is used for to set expired payment link
*SecurePaymentLinksApi* | [**securePaymentlinksIdPut**](docs/Api/SecurePaymentLinksApi.md#securepaymentlinksidput) | **PUT** /secure/paymentlinks/{id} | This API is used to update Payment Links
*SecurePaymentLinksApi* | [**securePaymentlinksPost**](docs/Api/SecurePaymentLinksApi.md#securepaymentlinkspost) | **POST** /secure/paymentlinks | This API is used to create Payment Links
*SecurePaymentsApi* | [**securePaymentsExportPost**](docs/Api/SecurePaymentsApi.md#securepaymentsexportpost) | **POST** /secure/payments/export | This API gets Secure payment by search criteria for the merchant.
*SecurePaymentsApi* | [**securePaymentsPost**](docs/Api/SecurePaymentsApi.md#securepaymentspost) | **POST** /secure/payments | This API posts new Secure payment request for the merchant.
*SecurePaymentsApi* | [**securePaymentsSearchPost**](docs/Api/SecurePaymentsApi.md#securepaymentssearchpost) | **POST** /secure/payments/search | This API gets Secure payment by search criteria for the merchant.
*SecurePaymentsApi* | [**securePaymentsdetailsPost**](docs/Api/SecurePaymentsApi.md#securepaymentsdetailspost) | **POST** /secure/paymentsdetails | This API is used for getting details of Payments
*SecurePremiumFinanceLiteApi* | [**secureEpfliteQuotesGeneratePost**](docs/Api/SecurePremiumFinanceLiteApi.md#secureepflitequotesgeneratepost) | **POST** /secure/epflite/quotes/generate | This API is used to generate the quote from the provider.
*SecurePremiumFinanceLiteApi* | [**secureEpfliteQuotesLinkPost**](docs/Api/SecurePremiumFinanceLiteApi.md#secureepflitequoteslinkpost) | **POST** /secure/epflite/quotes/link | This API will return quotes created againsts a payment link.
*SecurePremiumFinanceLiteApi* | [**secureEpfliteQuotesPaymentlinksPost**](docs/Api/SecurePremiumFinanceLiteApi.md#secureepflitequotespaymentlinkspost) | **POST** /secure/epflite/quotes/paymentlinks | This API is used to generate the quote from the provider.
*SecureRefundsApi* | [**secureRefundsEligibilityPost**](docs/Api/SecureRefundsApi.md#securerefundseligibilitypost) | **POST** /secure/refunds/eligibility | This API return refund eligibility of a transaction.
*SecureRefundsApi* | [**secureRefundsPost**](docs/Api/SecureRefundsApi.md#securerefundspost) | **POST** /secure/refunds | This API return refund a transaction.
*SecureReportsApi* | [**secureReportsDownloadsPost**](docs/Api/SecureReportsApi.md#securereportsdownloadspost) | **POST** /secure/reports/downloads | This API will add system report.
*SecureTokenLinksApi* | [**secureTokenlinksDetailsPost**](docs/Api/SecureTokenLinksApi.md#securetokenlinksdetailspost) | **POST** /secure/tokenlinks/details | This API is used for getting Token Links by TokenLink ID
*SecureTokenLinksApi* | [**secureTokenlinksExpirationsPost**](docs/Api/SecureTokenLinksApi.md#securetokenlinksexpirationspost) | **POST** /secure/tokenlinks/expirations | This API expires the token link.
*SecureTokenLinksApi* | [**secureTokenlinksListPost**](docs/Api/SecureTokenLinksApi.md#securetokenlinkslistpost) | **POST** /secure/tokenlinks/list | This API is used for getting all Token Links for Merchant
*SecureTokenLinksApi* | [**secureTokenlinksPost**](docs/Api/SecureTokenLinksApi.md#securetokenlinkspost) | **POST** /secure/tokenlinks | This API is use to create Secure Token Links
*SecureTokenLinksApi* | [**secureTokenlinksPut**](docs/Api/SecureTokenLinksApi.md#securetokenlinksput) | **PUT** /secure/tokenlinks | This API will update the expireIn and paymentType of Token Link.
*SecureTokenLinksApi* | [**secureTokensDetailsPost**](docs/Api/SecureTokenLinksApi.md#securetokensdetailspost) | **POST** /secure/tokens/details | This API is used for getting details of Token Link
*SecureTokenManagementApi* | [**secureTokensActivationsDelete**](docs/Api/SecureTokenManagementApi.md#securetokensactivationsdelete) | **DELETE** /secure/tokens/activations | This API is used for deactivating merchant token securely
*SecureVoidsApi* | [**secureCancellationsPost**](docs/Api/SecureVoidsApi.md#securecancellationspost) | **POST** /secure/cancellations | This API cancel a transaction.

## Models

- [AdminTransactionEntityResponse](docs/Model/AdminTransactionEntityResponse.md)
- [AdminTransactionSearchCriteria](docs/Model/AdminTransactionSearchCriteria.md)
- [CancelledTransactionResponse](docs/Model/CancelledTransactionResponse.md)
- [GetQuoteRequest](docs/Model/GetQuoteRequest.md)
- [MerchantTokenShortResponse](docs/Model/MerchantTokenShortResponse.md)
- [PFCheckEndorsementResponse](docs/Model/PFCheckEndorsementResponse.md)
- [PFCheckEndorsementResponseItem](docs/Model/PFCheckEndorsementResponseItem.md)
- [PFCheckEndorsementResponseItemQuoteInner](docs/Model/PFCheckEndorsementResponseItemQuoteInner.md)
- [PFCheckEndorsementsRequest](docs/Model/PFCheckEndorsementsRequest.md)
- [PFEndorsementRequest](docs/Model/PFEndorsementRequest.md)
- [PFEndorsementRequestQuote](docs/Model/PFEndorsementRequestQuote.md)
- [PFEndorsementRequestQuoteAgent](docs/Model/PFEndorsementRequestQuoteAgent.md)
- [PFEndorsementRequestQuoteAgentAddress](docs/Model/PFEndorsementRequestQuoteAgentAddress.md)
- [PFEndorsementRequestQuoteCommunication](docs/Model/PFEndorsementRequestQuoteCommunication.md)
- [PFEndorsementRequestQuoteDetails](docs/Model/PFEndorsementRequestQuoteDetails.md)
- [PFEndorsementRequestQuoteInsured](docs/Model/PFEndorsementRequestQuoteInsured.md)
- [PFEndorsementRequestQuoteInsuredAddress](docs/Model/PFEndorsementRequestQuoteInsuredAddress.md)
- [PFEndorsementRequestQuotePoliciesInner](docs/Model/PFEndorsementRequestQuotePoliciesInner.md)
- [PFEndorsementRequestQuotePoliciesInnerCompany](docs/Model/PFEndorsementRequestQuotePoliciesInnerCompany.md)
- [PFEndorsementRequestQuotePoliciesInnerGa](docs/Model/PFEndorsementRequestQuotePoliciesInnerGa.md)
- [PFEndorsementRequestQuotePoliciesInnerPolicyFeeInner](docs/Model/PFEndorsementRequestQuotePoliciesInnerPolicyFeeInner.md)
- [PFEndorsementRequestQuotePoliciesInnerTotalPayFundingInner](docs/Model/PFEndorsementRequestQuotePoliciesInnerTotalPayFundingInner.md)
- [PFEndorsementResponse](docs/Model/PFEndorsementResponse.md)
- [PFEndorsementResponseItem](docs/Model/PFEndorsementResponseItem.md)
- [PFEndorsementResponseItemQuote](docs/Model/PFEndorsementResponseItemQuote.md)
- [PFEndorsementResponseItemQuoteESignResult](docs/Model/PFEndorsementResponseItemQuoteESignResult.md)
- [PFLiteGetQuoteRequest](docs/Model/PFLiteGetQuoteRequest.md)
- [PFLitePaymentLinkRequest](docs/Model/PFLitePaymentLinkRequest.md)
- [PFLiteSecureQuoteRequest](docs/Model/PFLiteSecureQuoteRequest.md)
- [PFLiteSecureQuoteRequestInsured](docs/Model/PFLiteSecureQuoteRequestInsured.md)
- [PFLiteSecureQuoteRequestInsuredAddress](docs/Model/PFLiteSecureQuoteRequestInsuredAddress.md)
- [PFLiteSecureQuoteRequestMerchant](docs/Model/PFLiteSecureQuoteRequestMerchant.md)
- [PFLiteSecureQuoteRequestPoliciesInner](docs/Model/PFLiteSecureQuoteRequestPoliciesInner.md)
- [PFLiteSecureQuoteRequestPoliciesInnerCarrier](docs/Model/PFLiteSecureQuoteRequestPoliciesInnerCarrier.md)
- [PFLiteSecureQuoteRequestProgram](docs/Model/PFLiteSecureQuoteRequestProgram.md)
- [PFPolicyUpdateRequestDTO](docs/Model/PFPolicyUpdateRequestDTO.md)
- [PFQuoteEsignRequest](docs/Model/PFQuoteEsignRequest.md)
- [PFRetrievePFARequest](docs/Model/PFRetrievePFARequest.md)
- [PFUpdatePFARequestDTO](docs/Model/PFUpdatePFARequestDTO.md)
- [PaymentDetailsRequest](docs/Model/PaymentDetailsRequest.md)
- [PaymentIntentExpiresRequest](docs/Model/PaymentIntentExpiresRequest.md)
- [PaymentIntentExpiresResponse](docs/Model/PaymentIntentExpiresResponse.md)
- [PaymentIntentRequest](docs/Model/PaymentIntentRequest.md)
- [PaymentIntentRequestSplitsInner](docs/Model/PaymentIntentRequestSplitsInner.md)
- [PaymentIntentResponse](docs/Model/PaymentIntentResponse.md)
- [PaymentLinkPaymentRequest](docs/Model/PaymentLinkPaymentRequest.md)
- [PaymentLinkPaymentRequestTenderInfo](docs/Model/PaymentLinkPaymentRequestTenderInfo.md)
- [PaymentLinkRequest](docs/Model/PaymentLinkRequest.md)
- [PaymentLinkRequestCallbackParameters](docs/Model/PaymentLinkRequestCallbackParameters.md)
- [PaymentLinkRequestSettings](docs/Model/PaymentLinkRequestSettings.md)
- [PaymentLinkRequestSettingsIntent](docs/Model/PaymentLinkRequestSettingsIntent.md)
- [PaymentLinkResponse](docs/Model/PaymentLinkResponse.md)
- [PaymentLinkResponseCallbackParameters](docs/Model/PaymentLinkResponseCallbackParameters.md)
- [PaymentLinkResponseCustomersInner](docs/Model/PaymentLinkResponseCustomersInner.md)
- [PaymentLinkResponseDisplaySettings](docs/Model/PaymentLinkResponseDisplaySettings.md)
- [PaymentLinkResponseDisplaySettingsIntent](docs/Model/PaymentLinkResponseDisplaySettingsIntent.md)
- [PaymentLinkResponseLineItemsInner](docs/Model/PaymentLinkResponseLineItemsInner.md)
- [PaymentLinkResponseSplitsInner](docs/Model/PaymentLinkResponseSplitsInner.md)
- [QuoteRequest](docs/Model/QuoteRequest.md)
- [RefundEligibility](docs/Model/RefundEligibility.md)
- [ReportDownloadRequest](docs/Model/ReportDownloadRequest.md)
- [SecurePaymentDetailsRequest](docs/Model/SecurePaymentDetailsRequest.md)
- [SecurePaymentDetailsResponse](docs/Model/SecurePaymentDetailsResponse.md)
- [SecurePaymentDetailsResponseAchTenderInfo](docs/Model/SecurePaymentDetailsResponseAchTenderInfo.md)
- [SecurePaymentDetailsResponseCcTenderInfo](docs/Model/SecurePaymentDetailsResponseCcTenderInfo.md)
- [SecurePaymentDetailsResponseTransactionEntitySplitResponsesInner](docs/Model/SecurePaymentDetailsResponseTransactionEntitySplitResponsesInner.md)
- [SecurePaymentDetailsResponseTransactionResult](docs/Model/SecurePaymentDetailsResponseTransactionResult.md)
- [SecurePaymentLinkRequest](docs/Model/SecurePaymentLinkRequest.md)
- [SecurePaymentRequest](docs/Model/SecurePaymentRequest.md)
- [SecurePaymentRequestAdditionalFields](docs/Model/SecurePaymentRequestAdditionalFields.md)
- [SecurePaymentRequestBillingContact](docs/Model/SecurePaymentRequestBillingContact.md)
- [SecurePaymentRequestBillingContactName](docs/Model/SecurePaymentRequestBillingContactName.md)
- [SecurePaymentRequestTenderInfo](docs/Model/SecurePaymentRequestTenderInfo.md)
- [SecureTokenLinkIdRequest](docs/Model/SecureTokenLinkIdRequest.md)
- [SecureTokenLinkRequest](docs/Model/SecureTokenLinkRequest.md)
- [SecureTokenLinkRequestCustomersInner](docs/Model/SecureTokenLinkRequestCustomersInner.md)
- [SecureTokenLinkRequestCustomersInnerAddress](docs/Model/SecureTokenLinkRequestCustomersInnerAddress.md)
- [SecureTokenLinkUpdateRequest](docs/Model/SecureTokenLinkUpdateRequest.md)
- [SettingsRequest](docs/Model/SettingsRequest.md)
- [TokenLinkByIdResponse](docs/Model/TokenLinkByIdResponse.md)
- [TokenLinkByIdResponseAccountToken](docs/Model/TokenLinkByIdResponseAccountToken.md)
- [TokenLinkByIdResponseTimeLine](docs/Model/TokenLinkByIdResponseTimeLine.md)
- [TokenLinkResponse](docs/Model/TokenLinkResponse.md)
- [TokenLinkResponseCustomersInner](docs/Model/TokenLinkResponseCustomersInner.md)
- [TokenLinkResponseIntent](docs/Model/TokenLinkResponseIntent.md)
- [TokenLinkSearchCriteria](docs/Model/TokenLinkSearchCriteria.md)
- [TokenRequest](docs/Model/TokenRequest.md)
- [TransactionCancelRequest](docs/Model/TransactionCancelRequest.md)
- [TransactionRefundEligibilityRequest](docs/Model/TransactionRefundEligibilityRequest.md)
- [TransactionRefundRequest](docs/Model/TransactionRefundRequest.md)
- [TransactionResponse](docs/Model/TransactionResponse.md)
- [TransactionResponseBillingContact](docs/Model/TransactionResponseBillingContact.md)
- [TransactionResponseBillingContactAddress](docs/Model/TransactionResponseBillingContactAddress.md)
- [TransactionResponseBillingContactName](docs/Model/TransactionResponseBillingContactName.md)
- [TransactionResponseTenderInfo](docs/Model/TransactionResponseTenderInfo.md)
- [TransactionResponseTransactionResult](docs/Model/TransactionResponseTransactionResult.md)
- [UpdateIntentRequest](docs/Model/UpdateIntentRequest.md)

## Authorization

Authentication schemes defined for the API:
### x-api-key

- **Type**: API key
- **API key parameter name**: x-api-key
- **Location**: HTTP header


### x-app-key

- **Type**: API key
- **API key parameter name**: x-app-key
- **Location**: HTTP header


### Origin

- **Type**: API key
- **API key parameter name**: Origin
- **Location**: HTTP header


## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author



## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `v1`
    - Generator version: `7.6.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
