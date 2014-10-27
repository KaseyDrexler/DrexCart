<?php


/**
 * 
 * @package apiClasses.apiObjects.create
 */
class CreateCustomerPaymentProfileResponseType
{

  /**
   * 
   * @var int $customerPaymentProfileId
   * @access public
   */
  public $customerPaymentProfileId = null;

  /**
   * 
   * @var string $validationDirectResponse
   * @access public
   */
  public $validationDirectResponse = null;

  /**
   * 
   * @param int $customerPaymentProfileId
   * @param string $validationDirectResponse
   * @access public
   */
  public function __construct($customerPaymentProfileId, $validationDirectResponse)
  {
    $this->customerPaymentProfileId = $customerPaymentProfileId;
    $this->validationDirectResponse = $validationDirectResponse;
  }

}
