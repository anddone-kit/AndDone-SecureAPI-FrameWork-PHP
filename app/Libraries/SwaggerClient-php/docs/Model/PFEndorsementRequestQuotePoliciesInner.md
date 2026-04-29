# # PFEndorsementRequestQuotePoliciesInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**policyId** | **string** | This denotes the policy identifier. |
**premium** | **float** | This denotes the premium amount. |
**down** | **float** | This denotes the down amount. | [optional]
**downPercent** | **float** | This denotes the down amount. | [optional]
**fee** | **float** | This denotes the fee amount. | [optional]
**tax** | **float** | This denotes the tax amount. | [optional]
**number** | **string** | This denotes the policy number. | [optional]
**company** | [**\OpenAPI\Client\Model\PFEndorsementRequestQuotePoliciesInnerCompany**](PFEndorsementRequestQuotePoliciesInnerCompany.md) |  | [optional]
**ga** | [**\OpenAPI\Client\Model\PFEndorsementRequestQuotePoliciesInnerGa**](PFEndorsementRequestQuotePoliciesInnerGa.md) |  | [optional]
**broker** | [**\OpenAPI\Client\Model\PFEndorsementRequestQuotePoliciesInnerGa**](PFEndorsementRequestQuotePoliciesInnerGa.md) |  | [optional]
**coverage** | **string** | This denotes the coverage and it is required if adding new policy. | [optional]
**effectiveDate** | **string** | This denotes the effective date. |
**expirationDate** | **string** | This denotes the expiration date and it is required if adding new policy. |
**term** | **float** | This denotes the number of term. |
**minimumEarned** | **float** | This denotes the minimum Earned amount. | [optional]
**minimumEarnedPercent** | **float** | This denotes the minimum Earned percent. | [optional]
**auditable** | **bool** | This denotes the flag if its auditable or not. | [optional]
**cancelDays** | **string** | This denotes the cancel days. | [optional]
**lossPayeeRequested** | **bool** | This denotes the flag of loss payee requested. | [optional]
**minimumLiability** | **float** | This denotes the minimum laibility. | [optional]
**maximumLiability** | **float** | This denotes the maximum laibility. | [optional]
**totalPayFunding** | [**\OpenAPI\Client\Model\PFEndorsementRequestQuotePoliciesInnerTotalPayFundingInner[]**](PFEndorsementRequestQuotePoliciesInnerTotalPayFundingInner.md) |  | [optional]
**policyFee** | [**\OpenAPI\Client\Model\PFEndorsementRequestQuotePoliciesInnerPolicyFeeInner[]**](PFEndorsementRequestQuotePoliciesInnerPolicyFeeInner.md) |  | [optional]
**invoiceNumber** | **string** | This denotes the invoice number. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
