<?php


/**
 * 
 * @package apiClasses.apiObjects.customer
 */
class CustomerAddressType
{

  /**
   * 
   * @var string $phoneNumber
   * @access public
   */
  public $phoneNumber = null;

  /**
   * 
   * @var string $faxNumber
   * @access public
   */
  public $faxNumber = null;

  /**
   * 
   * @param string $phoneNumber
   * @param string $faxNumber
   * @access public
   */
  public function __construct($phoneNumber, $faxNumber)
  {
    $this->phoneNumber = $phoneNumber;
    $this->faxNumber = $faxNumber;
  }

}
