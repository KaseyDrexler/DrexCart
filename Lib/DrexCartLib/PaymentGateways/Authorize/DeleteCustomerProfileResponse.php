<?php


/**
 * 
 * @package apiClasses.apiObjects.delete
 */
class DeleteCustomerProfileResponse
{

  /**
   * 
   * @var DeleteCustomerProfileResponseType $DeleteCustomerProfileResult
   * @access public
   */
  public $DeleteCustomerProfileResult = null;

  /**
   * 
   * @param DeleteCustomerProfileResponseType $DeleteCustomerProfileResult
   * @access public
   */
  public function __construct($DeleteCustomerProfileResult)
  {
    $this->DeleteCustomerProfileResult = $DeleteCustomerProfileResult;
  }

}
