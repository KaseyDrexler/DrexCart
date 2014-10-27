<?php


/**
 * 
 * @package apiClasses.apiObjects.create
 */
class CreateCustomerProfileResponse
{

  /**
   * 
   * @var CreateCustomerProfileResponseType $CreateCustomerProfileResult
   * @access public
   */
  public $CreateCustomerProfileResult = null;

  /**
   * 
   * @param CreateCustomerProfileResponseType $CreateCustomerProfileResult
   * @access public
   */
  public function __construct($CreateCustomerProfileResult)
  {
    $this->CreateCustomerProfileResult = $CreateCustomerProfileResult;
  }

}
