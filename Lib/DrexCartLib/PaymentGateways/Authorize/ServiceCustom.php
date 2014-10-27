<?php

App::Uses('IsAlive', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('IsAliveResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ANetApiResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('MessageTypeEnum', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('MessagesTypeMessage', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('AuthenticateTest', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('MerchantAuthenticationType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('AuthenticateTestResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ARBCreateSubscription', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ARBSubscriptionType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('PaymentScheduleType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('PaymentScheduleTypeInterval', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ARBSubscriptionUnitEnum', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('PaymentType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('BankAccountType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('BankAccountBaseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('BankAccountTypeEnum', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('EcheckTypeEnum', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CreditCardType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CreditCardSimpleType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('OrderType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CustomerType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CustomerTypeEnum', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('DriversLicenseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('DriversLicenseBaseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('NameAndAddressType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ARBCreateSubscriptionResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ARBCreateSubscriptionResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ARBUpdateSubscription', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ARBUpdateSubscriptionResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ARBUpdateSubscriptionResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ARBCancelSubscription', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ARBCancelSubscriptionResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ARBCancelSubscriptionResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ARBGetSubscriptionStatus', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ARBGetSubscriptionStatusResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ARBGetSubscriptionStatusResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ARBSubscriptionStatusEnum', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ARBGetSubscriptionList', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ARBGetSubscriptionListRequestType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ARBGetSubscriptionListSearchTypeEnum', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ARBGetSubscriptionListSorting', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ARBGetSubscriptionListOrderFieldEnum', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('Paging', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ARBGetSubscriptionListResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ARBGetSubscriptionListResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('SubscriptionDetail', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('paymentMethodEnum', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CreateCustomerProfile', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CustomerProfileType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CustomerProfileBaseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CustomerPaymentProfileType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CustomerPaymentProfileBaseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CustomerAddressType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ValidationModeEnum', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CreateCustomerProfileResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CreateCustomerProfileResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CreateCustomerProfileFromTransaction', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CreateCustomerProfileFromTransactionResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CreateCustomerPaymentProfile', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CreateCustomerPaymentProfileResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CreateCustomerPaymentProfileResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CreateCustomerShippingAddress', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CreateCustomerShippingAddressResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CreateCustomerShippingAddressResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetCustomerProfile', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetCustomerProfileResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetCustomerProfileResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CustomerProfileMaskedType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CustomerProfileExType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CustomerPaymentProfileMaskedType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('PaymentMaskedType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('BankAccountMaskedType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CreditCardMaskedType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('TokenMaskedType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('DriversLicenseMaskedType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CustomerAddressExType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetCustomerPaymentProfile', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetCustomerPaymentProfileResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetCustomerPaymentProfileResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetCustomerShippingAddress', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetCustomerShippingAddressResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetCustomerShippingAddressResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('UpdateCustomerProfile', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('UpdateCustomerProfileResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('UpdateCustomerProfileResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('UpdateCustomerPaymentProfile', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CustomerPaymentProfileExType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('UpdateCustomerPaymentProfileResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('UpdateCustomerPaymentProfileResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('UpdateCustomerShippingAddress', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('UpdateCustomerShippingAddressResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('UpdateCustomerShippingAddressResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('DeleteCustomerProfile', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('DeleteCustomerProfileResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('DeleteCustomerProfileResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('DeleteCustomerPaymentProfile', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('DeleteCustomerPaymentProfileResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('DeleteCustomerPaymentProfileResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('DeleteCustomerShippingAddress', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('DeleteCustomerShippingAddressResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('DeleteCustomerShippingAddressResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CreateCustomerProfileTransaction', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ProfileTransactionType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ProfileTransVoidType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ProfileTransAuthOnlyType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ProfileTransOrderType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ProfileTransAmountType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ExtendedAmountType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('LineItemType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ProfileTransPriorAuthCaptureType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ProfileTransRefundType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('OrderExType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ProfileTransAuthCaptureType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ProfileTransCaptureOnlyType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CreateCustomerProfileTransactionResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CreateCustomerProfileTransactionResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ValidateCustomerPaymentProfile', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ValidateCustomerPaymentProfileResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('ValidateCustomerPaymentProfileResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetCustomerProfileIds', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetCustomerProfileIdsResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetCustomerProfileIdsResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetHostedProfilePage', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('SettingType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetHostedProfilePageResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetHostedProfilePageResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('UpdateSplitTenderGroup', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('SplitTenderStatusEnum', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('UpdateSplitTenderGroupResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('UpdateSplitTenderGroupResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetTransactionDetails', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetTransactionDetailsResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetTransactionDetailsResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('TransactionDetailsType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('FDSFilterType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('BatchDetailsType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('BatchStatisticType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('CustomerDataType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('subscriptionPaymentType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('returnedItem', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('solutionInfo', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetSettledBatchList', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetSettledBatchListRequestType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetSettledBatchListResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetSettledBatchListResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetBatchStatistics', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetBatchStatisticsRequestType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetBatchStatisticsResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetBatchStatisticsResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetTransactionList', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetTransactionListRequestType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetTransactionListResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetTransactionListResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('TransactionSummaryType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetUnsettledTransactionList', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetUnsettledTransactionListRequestType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetUnsettledTransactionListResponse', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
App::Uses('GetUnsettledTransactionListResponseType', 'DrexCart.DrexCartLib/PaymentGateways/Authorize');
//App::Uses('SoapClientWrapper', 'apiClasses/structure');


/**
 * 
 * @package apiClasses.apiObjects.service
 */
class ServiceCustom extends SoapClient
{

  /**
   * 
   * @var array $classmap The defined classes
   * @access private
   */
  private static $classmap = array(
    'IsAlive' => '\\IsAlive',
    'IsAliveResponse' => '\\IsAliveResponse',
    'ANetApiResponseType' => '\\ANetApiResponseType',
    'MessagesTypeMessage' => '\\MessagesTypeMessage',
    'AuthenticateTest' => '\\AuthenticateTest',
    'MerchantAuthenticationType' => '\\MerchantAuthenticationType',
    'AuthenticateTestResponse' => '\\AuthenticateTestResponse',
    'ARBCreateSubscription' => '\\ARBCreateSubscription',
    'ARBSubscriptionType' => '\\ARBSubscriptionType',
    'PaymentScheduleType' => '\\PaymentScheduleType',
    'PaymentScheduleTypeInterval' => '\\PaymentScheduleTypeInterval',
    'PaymentType' => '\\PaymentType',
    'BankAccountType' => '\\BankAccountType',
    'BankAccountBaseType' => '\\BankAccountBaseType',
    'CreditCardType' => '\\CreditCardType',
    'CreditCardSimpleType' => '\\CreditCardSimpleType',
    'OrderType' => '\\OrderType',
    'CustomerType' => '\\CustomerType',
    'DriversLicenseType' => '\\DriversLicenseType',
    'DriversLicenseBaseType' => '\\DriversLicenseBaseType',
    'NameAndAddressType' => '\\NameAndAddressType',
    'ARBCreateSubscriptionResponse' => '\\ARBCreateSubscriptionResponse',
    'ARBCreateSubscriptionResponseType' => '\\ARBCreateSubscriptionResponseType',
    'ARBUpdateSubscription' => '\\ARBUpdateSubscription',
    'ARBUpdateSubscriptionResponse' => '\\ARBUpdateSubscriptionResponse',
    'ARBUpdateSubscriptionResponseType' => '\\ARBUpdateSubscriptionResponseType',
    'ARBCancelSubscription' => '\\ARBCancelSubscription',
    'ARBCancelSubscriptionResponse' => '\\ARBCancelSubscriptionResponse',
    'ARBCancelSubscriptionResponseType' => '\\ARBCancelSubscriptionResponseType',
    'ARBGetSubscriptionStatus' => '\\ARBGetSubscriptionStatus',
    'ARBGetSubscriptionStatusResponse' => '\\ARBGetSubscriptionStatusResponse',
    'ARBGetSubscriptionStatusResponseType' => '\\ARBGetSubscriptionStatusResponseType',
    'ARBGetSubscriptionList' => '\\ARBGetSubscriptionList',
    'ARBGetSubscriptionListRequestType' => '\\ARBGetSubscriptionListRequestType',
    'ARBGetSubscriptionListSorting' => '\\ARBGetSubscriptionListSorting',
    'Paging' => '\\Paging',
    'ARBGetSubscriptionListResponse' => '\\ARBGetSubscriptionListResponse',
    'ARBGetSubscriptionListResponseType' => '\\ARBGetSubscriptionListResponseType',
    'SubscriptionDetail' => '\\SubscriptionDetail',
    'CreateCustomerProfile' => '\\CreateCustomerProfile',
    'CustomerProfileType' => '\\CustomerProfileType',
    'CustomerProfileBaseType' => '\\CustomerProfileBaseType',
    'CustomerPaymentProfileType' => '\\CustomerPaymentProfileType',
    'CustomerPaymentProfileBaseType' => '\\CustomerPaymentProfileBaseType',
    'CustomerAddressType' => '\\CustomerAddressType',
    'CreateCustomerProfileResponse' => '\\CreateCustomerProfileResponse',
    'CreateCustomerProfileResponseType' => '\\CreateCustomerProfileResponseType',
    'CreateCustomerProfileFromTransaction' => '\\CreateCustomerProfileFromTransaction',
    'CreateCustomerProfileFromTransactionResponse' => '\\CreateCustomerProfileFromTransactionResponse',
    'CreateCustomerPaymentProfile' => '\\CreateCustomerPaymentProfile',
    'CreateCustomerPaymentProfileResponse' => '\\CreateCustomerPaymentProfileResponse',
    'CreateCustomerPaymentProfileResponseType' => '\\CreateCustomerPaymentProfileResponseType',
    'CreateCustomerShippingAddress' => '\\CreateCustomerShippingAddress',
    'CreateCustomerShippingAddressResponse' => '\\CreateCustomerShippingAddressResponse',
    'CreateCustomerShippingAddressResponseType' => '\\CreateCustomerShippingAddressResponseType',
    'GetCustomerProfile' => '\\GetCustomerProfile',
    'GetCustomerProfileResponse' => '\\GetCustomerProfileResponse',
    'GetCustomerProfileResponseType' => '\\GetCustomerProfileResponseType',
    'CustomerProfileMaskedType' => '\\CustomerProfileMaskedType',
    'CustomerProfileExType' => '\\CustomerProfileExType',
    'CustomerPaymentProfileMaskedType' => '\\CustomerPaymentProfileMaskedType',
    'PaymentMaskedType' => '\\PaymentMaskedType',
    'BankAccountMaskedType' => '\\BankAccountMaskedType',
    'CreditCardMaskedType' => '\\CreditCardMaskedType',
    'TokenMaskedType' => '\\TokenMaskedType',
    'DriversLicenseMaskedType' => '\\DriversLicenseMaskedType',
    'CustomerAddressExType' => '\\CustomerAddressExType',
    'GetCustomerPaymentProfile' => '\\GetCustomerPaymentProfile',
    'GetCustomerPaymentProfileResponse' => '\\GetCustomerPaymentProfileResponse',
    'GetCustomerPaymentProfileResponseType' => '\\GetCustomerPaymentProfileResponseType',
    'GetCustomerShippingAddress' => '\\GetCustomerShippingAddress',
    'GetCustomerShippingAddressResponse' => '\\GetCustomerShippingAddressResponse',
    'GetCustomerShippingAddressResponseType' => '\\GetCustomerShippingAddressResponseType',
    'UpdateCustomerProfile' => '\\UpdateCustomerProfile',
    'UpdateCustomerProfileResponse' => '\\UpdateCustomerProfileResponse',
    'UpdateCustomerProfileResponseType' => '\\UpdateCustomerProfileResponseType',
    'UpdateCustomerPaymentProfile' => '\\UpdateCustomerPaymentProfile',
    'CustomerPaymentProfileExType' => '\\CustomerPaymentProfileExType',
    'UpdateCustomerPaymentProfileResponse' => '\\UpdateCustomerPaymentProfileResponse',
    'UpdateCustomerPaymentProfileResponseType' => '\\UpdateCustomerPaymentProfileResponseType',
    'UpdateCustomerShippingAddress' => '\\UpdateCustomerShippingAddress',
    'UpdateCustomerShippingAddressResponse' => '\\UpdateCustomerShippingAddressResponse',
    'UpdateCustomerShippingAddressResponseType' => '\\UpdateCustomerShippingAddressResponseType',
    'DeleteCustomerProfile' => '\\DeleteCustomerProfile',
    'DeleteCustomerProfileResponse' => '\\DeleteCustomerProfileResponse',
    'DeleteCustomerProfileResponseType' => '\\DeleteCustomerProfileResponseType',
    'DeleteCustomerPaymentProfile' => '\\DeleteCustomerPaymentProfile',
    'DeleteCustomerPaymentProfileResponse' => '\\DeleteCustomerPaymentProfileResponse',
    'DeleteCustomerPaymentProfileResponseType' => '\\DeleteCustomerPaymentProfileResponseType',
    'DeleteCustomerShippingAddress' => '\\DeleteCustomerShippingAddress',
    'DeleteCustomerShippingAddressResponse' => '\\DeleteCustomerShippingAddressResponse',
    'DeleteCustomerShippingAddressResponseType' => '\\DeleteCustomerShippingAddressResponseType',
    'CreateCustomerProfileTransaction' => '\\CreateCustomerProfileTransaction',
    'ProfileTransactionType' => '\\ProfileTransactionType',
    'ProfileTransVoidType' => '\\ProfileTransVoidType',
    'ProfileTransAuthOnlyType' => '\\ProfileTransAuthOnlyType',
    'ProfileTransOrderType' => '\\ProfileTransOrderType',
    'ProfileTransAmountType' => '\\ProfileTransAmountType',
    'ExtendedAmountType' => '\\ExtendedAmountType',
    'LineItemType' => '\\LineItemType',
    'ProfileTransPriorAuthCaptureType' => '\\ProfileTransPriorAuthCaptureType',
    'ProfileTransRefundType' => '\\ProfileTransRefundType',
    'OrderExType' => '\\OrderExType',
    'ProfileTransAuthCaptureType' => '\\ProfileTransAuthCaptureType',
    'ProfileTransCaptureOnlyType' => '\\ProfileTransCaptureOnlyType',
    'CreateCustomerProfileTransactionResponse' => '\\CreateCustomerProfileTransactionResponse',
    'CreateCustomerProfileTransactionResponseType' => '\\CreateCustomerProfileTransactionResponseType',
    'ValidateCustomerPaymentProfile' => '\\ValidateCustomerPaymentProfile',
    'ValidateCustomerPaymentProfileResponse' => '\\ValidateCustomerPaymentProfileResponse',
    'ValidateCustomerPaymentProfileResponseType' => '\\ValidateCustomerPaymentProfileResponseType',
    'GetCustomerProfileIds' => '\\GetCustomerProfileIds',
    'GetCustomerProfileIdsResponse' => '\\GetCustomerProfileIdsResponse',
    'GetCustomerProfileIdsResponseType' => '\\GetCustomerProfileIdsResponseType',
    'GetHostedProfilePage' => '\\GetHostedProfilePage',
    'SettingType' => '\\SettingType',
    'GetHostedProfilePageResponse' => '\\GetHostedProfilePageResponse',
    'GetHostedProfilePageResponseType' => '\\GetHostedProfilePageResponseType',
    'UpdateSplitTenderGroup' => '\\UpdateSplitTenderGroup',
    'UpdateSplitTenderGroupResponse' => '\\UpdateSplitTenderGroupResponse',
    'UpdateSplitTenderGroupResponseType' => '\\UpdateSplitTenderGroupResponseType',
    'GetTransactionDetails' => '\\GetTransactionDetails',
    'GetTransactionDetailsResponse' => '\\GetTransactionDetailsResponse',
    'GetTransactionDetailsResponseType' => '\\GetTransactionDetailsResponseType',
    'TransactionDetailsType' => '\\TransactionDetailsType',
    'FDSFilterType' => '\\FDSFilterType',
    'BatchDetailsType' => '\\BatchDetailsType',
    'BatchStatisticType' => '\\BatchStatisticType',
    'CustomerDataType' => '\\CustomerDataType',
    'subscriptionPaymentType' => '\\subscriptionPaymentType',
    'returnedItem' => '\\returnedItem',
    'solutionInfo' => '\\solutionInfo',
    'GetSettledBatchList' => '\\GetSettledBatchList',
    'GetSettledBatchListRequestType' => '\\GetSettledBatchListRequestType',
    'GetSettledBatchListResponse' => '\\GetSettledBatchListResponse',
    'GetSettledBatchListResponseType' => '\\GetSettledBatchListResponseType',
    'GetBatchStatistics' => '\\GetBatchStatistics',
    'GetBatchStatisticsRequestType' => '\\GetBatchStatisticsRequestType',
    'GetBatchStatisticsResponse' => '\\GetBatchStatisticsResponse',
    'GetBatchStatisticsResponseType' => '\\GetBatchStatisticsResponseType',
    'GetTransactionList' => '\\GetTransactionList',
    'GetTransactionListRequestType' => '\\GetTransactionListRequestType',
    'GetTransactionListResponse' => '\\GetTransactionListResponse',
    'GetTransactionListResponseType' => '\\GetTransactionListResponseType',
    'TransactionSummaryType' => '\\TransactionSummaryType',
    'GetUnsettledTransactionList' => '\\GetUnsettledTransactionList',
    'GetUnsettledTransactionListRequestType' => '\\GetUnsettledTransactionListRequestType',
    'GetUnsettledTransactionListResponse' => '\\GetUnsettledTransactionListResponse',
    'GetUnsettledTransactionListResponseType' => '\\GetUnsettledTransactionListResponseType');

  /**
   * 
   * @param array $options A array of config values
   * @param string $wsdl The wsdl file to use
   * @access public
   */
  public function __construct(array $options = array(), $wsdl = 'https://api.authorize.net/soap/v1/Service.asmx?WSDL')
  {
    foreach (self::$classmap as $key => $value) {
      if (!isset($options['classmap'][$key])) {
        $options['classmap'][$key] = $value;
      }
    }
    
    parent::__construct($wsdl, $options);
  }

  /**
   * This method is used to test the availability of the API.
   * 
   * @param IsAlive $parameters
   * @access public
   * @return IsAliveResponse
   */
  public function IsAlive(IsAlive $parameters)
  {
    return $this->__soapCall('IsAlive', array($parameters));
  }

  /**
   * This method is used to test the availability of the API.
   * 
   * @param AuthenticateTest $parameters
   * @access public
   * @return AuthenticateTestResponse
   */
  public function AuthenticateTest(AuthenticateTest $parameters)
  {
    return $this->__soapCall('AuthenticateTest', array($parameters));
  }

  /**
   * This method is used to create a new ARB subscription. The merchant must be signed up for the ARB service to use it.
   * 
   * @param ARBCreateSubscription $parameters
   * @access public
   * @return ARBCreateSubscriptionResponse
   */
  public function ARBCreateSubscription(ARBCreateSubscription $parameters)
  {
    return $this->__soapCall('ARBCreateSubscription', array($parameters));
  }

  /**
   * This method is used to update an existing ARB subscription. The merchant must be signed up for the ARB service to use it.
   * 
   * @param ARBUpdateSubscription $parameters
   * @access public
   * @return ARBUpdateSubscriptionResponse
   */
  public function ARBUpdateSubscription(ARBUpdateSubscription $parameters)
  {
    return $this->__soapCall('ARBUpdateSubscription', array($parameters));
  }

  /**
   * This method is used to cancel an existing ARB subscription. The merchant must be signed up for the ARB service to use it.
   * 
   * @param ARBCancelSubscription $parameters
   * @access public
   * @return ARBCancelSubscriptionResponse
   */
  public function ARBCancelSubscription(ARBCancelSubscription $parameters)
  {
    return $this->__soapCall('ARBCancelSubscription', array($parameters));
  }

  /**
   * This method is used to get an existing ARB subscription status. The merchant must be signed up for the ARB service to use it.
   * 
   * @param ARBGetSubscriptionStatus $parameters
   * @access public
   * @return ARBGetSubscriptionStatusResponse
   */
  public function ARBGetSubscriptionStatus(ARBGetSubscriptionStatus $parameters)
  {
    return $this->__soapCall('ARBGetSubscriptionStatus', array($parameters));
  }

  /**
   * This method is used to get existing ARB subscriptions. The merchant must be signed up for the ARB service to use it.
   * 
   * @param ARBGetSubscriptionList $parameters
   * @access public
   * @return ARBGetSubscriptionListResponse
   */
  public function ARBGetSubscriptionList(ARBGetSubscriptionList $parameters)
  {
    return $this->__soapCall('ARBGetSubscriptionList', array($parameters));
  }

  /**
   * This method is used to create a new customer profile along with any customer payment profiles and customer shipping addresses for the customer profile. The merchant must be signed up for the CIM service to use it.
   * 
   * @param CreateCustomerProfile $parameters
   * @access public
   * @return CreateCustomerProfileResponse
   */
  public function CreateCustomerProfile(CreateCustomerProfile $parameters)
  {
    return $this->__soapCall('CreateCustomerProfile', array($parameters));
  }

  /**
   * This method is used to create a new customer profile along with any customer payment profiles and customer shipping addresses for the customer profile, using information from a previous transaction. The merchant must be signed up for the CIM service to use it.
   * 
   * @param CreateCustomerProfileFromTransaction $parameters
   * @access public
   * @return CreateCustomerProfileFromTransactionResponse
   */
  public function CreateCustomerProfileFromTransaction(CreateCustomerProfileFromTransaction $parameters)
  {
    return $this->__soapCall('CreateCustomerProfileFromTransaction', array($parameters));
  }

  /**
   * This method is used to create a new customer payment profile for an existing customer profile. The merchant must be signed up for the CIM service to use it.
   * 
   * @param CreateCustomerPaymentProfile $parameters
   * @access public
   * @return CreateCustomerPaymentProfileResponse
   */
  public function CreateCustomerPaymentProfile(CreateCustomerPaymentProfile $parameters)
  {
    return $this->__soapCall('CreateCustomerPaymentProfile', array($parameters));
  }

  /**
   * This method is used to create a new customer shipping address for an existing customer profile. The merchant must be signed up for the CIM service to use it.
   * 
   * @param CreateCustomerShippingAddress $parameters
   * @access public
   * @return CreateCustomerShippingAddressResponse
   */
  public function CreateCustomerShippingAddress(CreateCustomerShippingAddress $parameters)
  {
    return $this->__soapCall('CreateCustomerShippingAddress', array($parameters));
  }

  /**
   * This method is used to retrieve an existing customer profile along with all the customer payment profiles and customer shipping addresses for the customer profile. The merchant must be signed up for the CIM service to use it.
   * 
   * @param GetCustomerProfile $parameters
   * @access public
   * @return GetCustomerProfileResponse
   */
  public function GetCustomerProfile(GetCustomerProfile $parameters)
  {
    return $this->__soapCall('GetCustomerProfile', array($parameters));
  }

  /**
   * This method is used to retrieve an existing customer payment profile for a customer profile. The merchant must be signed up for the CIM service to use it.
   * 
   * @param GetCustomerPaymentProfile $parameters
   * @access public
   * @return GetCustomerPaymentProfileResponse
   */
  public function GetCustomerPaymentProfile(GetCustomerPaymentProfile $parameters)
  {
    return $this->__soapCall('GetCustomerPaymentProfile', array($parameters));
  }

  /**
   * This method is used to retrieve an existing customer shipping address for a customer profile. The merchant must be signed up for the CIM service to use it.
   * 
   * @param GetCustomerShippingAddress $parameters
   * @access public
   * @return GetCustomerShippingAddressResponse
   */
  public function GetCustomerShippingAddress(GetCustomerShippingAddress $parameters)
  {
    return $this->__soapCall('GetCustomerShippingAddress', array($parameters));
  }

  /**
   * This method is used to update an existing customer profile. The merchant must be signed up for the CIM service to use it.
   * 
   * @param UpdateCustomerProfile $parameters
   * @access public
   * @return UpdateCustomerProfileResponse
   */
  public function UpdateCustomerProfile(UpdateCustomerProfile $parameters)
  {
    return $this->__soapCall('UpdateCustomerProfile', array($parameters));
  }

  /**
   * This method is used to update an existing customer payment profile for a customer profile. The merchant must be signed up for the CIM service to use it.
   * 
   * @param UpdateCustomerPaymentProfile $parameters
   * @access public
   * @return UpdateCustomerPaymentProfileResponse
   */
  public function UpdateCustomerPaymentProfile(UpdateCustomerPaymentProfile $parameters)
  {
    return $this->__soapCall('UpdateCustomerPaymentProfile', array($parameters));
  }

  /**
   * This method is used to update an existing customer shipping address for a customer profile. The merchant must be signed up for the CIM service to use it.
   * 
   * @param UpdateCustomerShippingAddress $parameters
   * @access public
   * @return UpdateCustomerShippingAddressResponse
   */
  public function UpdateCustomerShippingAddress(UpdateCustomerShippingAddress $parameters)
  {
    return $this->__soapCall('UpdateCustomerShippingAddress', array($parameters));
  }

  /**
   * This method is used to delete an existing customer profile along with all the customer payment profiles and customer shipping addresses for the customer profile. The merchant must be signed up for the CIM service to use it.
   * 
   * @param DeleteCustomerProfile $parameters
   * @access public
   * @return DeleteCustomerProfileResponse
   */
  public function DeleteCustomerProfile(DeleteCustomerProfile $parameters)
  {
    return $this->__soapCall('DeleteCustomerProfile', array($parameters));
  }

  /**
   * This method is used to delete an existing customer payment profile from a customer profile. The merchant must be signed up for the CIM service to use it.
   * 
   * @param DeleteCustomerPaymentProfile $parameters
   * @access public
   * @return DeleteCustomerPaymentProfileResponse
   */
  public function DeleteCustomerPaymentProfile(DeleteCustomerPaymentProfile $parameters)
  {
    return $this->__soapCall('DeleteCustomerPaymentProfile', array($parameters));
  }

  /**
   * This method is used to delete an existing customer shipping address from a customer profile. The merchant must be signed up for the CIM service to use it.
   * 
   * @param DeleteCustomerShippingAddress $parameters
   * @access public
   * @return DeleteCustomerShippingAddressResponse
   */
  public function DeleteCustomerShippingAddress(DeleteCustomerShippingAddress $parameters)
  {
    return $this->__soapCall('DeleteCustomerShippingAddress', array($parameters));
  }

  /**
   * This method is used to generate a payment transaction for a customer payment profile. The merchant must be signed up for the CIM service to use it.
   * 
   * @param CreateCustomerProfileTransaction $parameters
   * @access public
   * @return CreateCustomerProfileTransactionResponse
   */
  public function CreateCustomerProfileTransaction(CreateCustomerProfileTransaction $parameters)
  {
    return $this->__soapCall('CreateCustomerProfileTransaction', array($parameters));
  }

  /**
   * This method is used to check a customer payment profile by generating a test transaction for it. The merchant must be signed up for the CIM service to use it.
   * 
   * @param ValidateCustomerPaymentProfile $parameters
   * @access public
   * @return ValidateCustomerPaymentProfileResponse
   */
  public function ValidateCustomerPaymentProfile(ValidateCustomerPaymentProfile $parameters)
  {
    return $this->__soapCall('ValidateCustomerPaymentProfile', array($parameters));
  }

  /**
   * This method is used to retrieve a list of profile identifiers. The merchant must be signed up for the CIM service to use it.
   * 
   * @param GetCustomerProfileIds $parameters
   * @access public
   * @return GetCustomerProfileIdsResponse
   */
  public function GetCustomerProfileIds(GetCustomerProfileIds $parameters)
  {
    return $this->__soapCall('GetCustomerProfileIds', array($parameters));
  }

  /**
   * This method is used to give access to the hosted customer profile page to one of your customers. The merchant must be signed up for the CIM service to use it.
   * 
   * @param GetHostedProfilePage $parameters
   * @access public
   * @return GetHostedProfilePageResponse
   */
  public function GetHostedProfilePage(GetHostedProfilePage $parameters)
  {
    return $this->__soapCall('GetHostedProfilePage', array($parameters));
  }

  /**
   * This method is used void or release an order after getting a partial authorization for a transaction.
   * 
   * @param UpdateSplitTenderGroup $parameters
   * @access public
   * @return UpdateSplitTenderGroupResponse
   */
  public function UpdateSplitTenderGroup(UpdateSplitTenderGroup $parameters)
  {
    return $this->__soapCall('UpdateSplitTenderGroup', array($parameters));
  }

  /**
   * This method is used to retrieve detailed information about a single transaction.
   * 
   * @param GetTransactionDetails $parameters
   * @access public
   * @return GetTransactionDetailsResponse
   */
  public function GetTransactionDetails(GetTransactionDetails $parameters)
  {
    return $this->__soapCall('GetTransactionDetails', array($parameters));
  }

  /**
   * This method is used to retrieve a list of settled batches.
   * 
   * @param GetSettledBatchList $parameters
   * @access public
   * @return GetSettledBatchListResponse
   */
  public function GetSettledBatchList(GetSettledBatchList $parameters)
  {
    return $this->__soapCall('GetSettledBatchList', array($parameters));
  }

  /**
   * This method is used to get the batch details for the specified BatchId.
   * 
   * @param GetBatchStatistics $parameters
   * @access public
   * @return GetBatchStatisticsResponse
   */
  public function GetBatchStatistics(GetBatchStatistics $parameters)
  {
    return $this->__soapCall('GetBatchStatistics', array($parameters));
  }

  /**
   * This method is used to retrieve a list of settled transactions.
   * 
   * @param GetTransactionList $parameters
   * @access public
   * @return GetTransactionListResponse
   */
  public function GetTransactionList(GetTransactionList $parameters)
  {
    return $this->__soapCall('GetTransactionList', array($parameters));
  }

  /**
   * This method is used to retrieve a list of unsettled transactions.
   * 
   * @param GetUnsettledTransactionList $parameters
   * @access public
   * @return GetUnsettledTransactionListResponse
   */
  public function GetUnsettledTransactionList(GetUnsettledTransactionList $parameters)
  {
    return $this->__soapCall('GetUnsettledTransactionList', array($parameters));
  }

}
