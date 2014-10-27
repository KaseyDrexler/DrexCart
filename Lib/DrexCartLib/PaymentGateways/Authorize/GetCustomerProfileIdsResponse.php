<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetCustomerProfileIdsResponse
{

  /**
   * 
   * @var GetCustomerProfileIdsResponseType $GetCustomerProfileIdsResult
   * @access public
   */
  public $GetCustomerProfileIdsResult = null;

  /**
   * 
   * @param GetCustomerProfileIdsResponseType $GetCustomerProfileIdsResult
   * @access public
   */
  public function __construct($GetCustomerProfileIdsResult)
  {
    $this->GetCustomerProfileIdsResult = $GetCustomerProfileIdsResult;
  }

}
