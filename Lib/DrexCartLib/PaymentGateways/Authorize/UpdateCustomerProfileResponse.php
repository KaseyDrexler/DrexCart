<?php


/**
 * 
 * @package apiClasses.apiObjects.update
 */
class UpdateCustomerProfileResponse
{

  /**
   * 
   * @var UpdateCustomerProfileResponseType $UpdateCustomerProfileResult
   * @access public
   */
  public $UpdateCustomerProfileResult = null;

  /**
   * 
   * @param UpdateCustomerProfileResponseType $UpdateCustomerProfileResult
   * @access public
   */
  public function __construct($UpdateCustomerProfileResult)
  {
    $this->UpdateCustomerProfileResult = $UpdateCustomerProfileResult;
  }

}
