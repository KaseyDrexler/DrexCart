<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetCustomerProfileResponse
{

  /**
   * 
   * @var GetCustomerProfileResponseType $GetCustomerProfileResult
   * @access public
   */
  public $GetCustomerProfileResult = null;

  /**
   * 
   * @param GetCustomerProfileResponseType $GetCustomerProfileResult
   * @access public
   */
  public function __construct($GetCustomerProfileResult)
  {
    $this->GetCustomerProfileResult = $GetCustomerProfileResult;
  }

}
