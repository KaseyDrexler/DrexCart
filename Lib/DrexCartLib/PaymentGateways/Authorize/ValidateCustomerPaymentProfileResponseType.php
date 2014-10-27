<?php


/**
 * 
 * @package apiClasses.apiObjects.validate
 */
class ValidateCustomerPaymentProfileResponseType
{

  /**
   * 
   * @var string $directResponse
   * @access public
   */
  public $directResponse = null;

  /**
   * 
   * @param string $directResponse
   * @access public
   */
  public function __construct($directResponse)
  {
    $this->directResponse = $directResponse;
  }

}
