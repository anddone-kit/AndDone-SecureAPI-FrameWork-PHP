# # PaymentLinkRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**title** | **string** |  | [optional]
**merchantId** | **string** |  | [optional]
**shortDescription** | **string** |  | [optional]
**paymentDescription** | **string** |  | [optional]
**amount** | **float** |  | [optional]
**invoiceNumber** | **string** |  | [optional]
**enablePartialPayment** | **bool** |  | [optional]
**enableMultiplePayment** | **bool** |  | [optional]
**enableProtection** | **bool** |  | [optional]
**displayReceipt** | **bool** |  | [optional]
**expireIn** | **string** |  | [optional]
**expireInUnit** | **int** |  | [optional]
**referenceType** | **string** |  | [optional]
**referenceNumber** | **string** |  | [optional]
**accountNumber** | **string** |  | [optional]
**responseType** | **int** |  | [optional]
**callbackParameters** | [**\OpenAPI\Client\Model\PaymentLinkRequestCallbackParameters**](PaymentLinkRequestCallbackParameters.md) |  | [optional]
**applyPaymentAdjustments** | **bool** |  | [optional]
**customers** | [**\OpenAPI\Client\Model\PaymentLinkResponseCustomersInner[]**](PaymentLinkResponseCustomersInner.md) |  | [optional]
**lineItems** | [**\OpenAPI\Client\Model\PaymentLinkResponseLineItemsInner[]**](PaymentLinkResponseLineItemsInner.md) |  | [optional]
**settings** | [**\OpenAPI\Client\Model\PaymentLinkRequestSettings**](PaymentLinkRequestSettings.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
