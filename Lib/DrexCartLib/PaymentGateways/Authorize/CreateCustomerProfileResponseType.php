<?php


/**
 * 
 * @package apiClasses.apiObjects.create
 */
class CreateCustomerProfileResponseType
{

  /**
   * 
   * @var int $customerProfileId
   * @access public
   */
  public $customerProfileId = null;

  /**
   * 
   * @var Long[] $customerPaymentProfileIdList
   * @access public
   */
  public $customerPaymentProfileIdList = null;

  /**
   * 
   * @var Long[] $customerShippingAddressIdList
   * @access public
   */
  public $customerShippingAddressIdList = null;

  /**
   * 
   * @var String[] $validationDirectResponseList
   * @access public
   */
  public $validationDirectResponseList = null;

  /**
   * 
   * @param int $customerProfileId
   * @param Long[] $customerPaymentProfileIdList
   * @param Long[] $customerShippingAddressIdList
   * @param String[] $validationDirectResponseList
   * @access public
   */
  public function __construct($customerProfileId, $customerPaymentProfileIdList, $customerShippingAddressIdList, $validationDirectResponseList)
  {
    $this->customerProfileId = $customerProfileId;
    $this->customerPaymentProfileIdList = $customerPaymentProfileIdList;
    $this->customerShippingAddressIdList = $customerShippingAddressIdList;
    $this->validationDirectResponseList = $validationDirectResponseList;
  }

}
