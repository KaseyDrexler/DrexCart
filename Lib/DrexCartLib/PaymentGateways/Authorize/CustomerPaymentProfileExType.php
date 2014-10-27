<?php


/**
 * 
 * @package apiClasses.apiObjects.customer
 */
class CustomerPaymentProfileExType
{

  /**
   * 
   * @var int $customerPaymentProfileId
   * @access public
   */
  public $customerPaymentProfileId = null;

  /**
   * 
   * @param int $customerPaymentProfileId
   * @access public
   */
  public function __construct($customerPaymentProfileId)
  {
    $this->customerPaymentProfileId = $customerPaymentProfileId;
  }

}
