<?php


/**
 * 
 * @package apiClasses.apiObjects.customer
 */
class CustomerProfileExType
{

  /**
   * 
   * @var int $customerProfileId
   * @access public
   */
  public $customerProfileId = null;

  /**
   * 
   * @param int $customerProfileId
   * @access public
   */
  public function __construct($customerProfileId)
  {
    $this->customerProfileId = $customerProfileId;
  }

}
