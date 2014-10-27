<?php


/**
 * 
 * @package apiClasses.apiObjects.update
 */
class UpdateCustomerPaymentProfileResponseType
{

  /**
   * 
   * @var string $validationDirectResponse
   * @access public
   */
  public $validationDirectResponse = null;

  /**
   * 
   * @param string $validationDirectResponse
   * @access public
   */
  public function __construct($validationDirectResponse)
  {
    $this->validationDirectResponse = $validationDirectResponse;
  }

}
