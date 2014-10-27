<?php


/**
 * 
 * @package apiClasses.apiObjects.customer
 */
class CustomerProfileBaseType
{

  /**
   * 
   * @var string $merchantCustomerId
   * @access public
   */
  public $merchantCustomerId = null;

  /**
   * 
   * @var string $description
   * @access public
   */
  public $description = null;

  /**
   * 
   * @var string $email
   * @access public
   */
  public $email = null;

  /**
   * 
   * @param string $merchantCustomerId
   * @param string $description
   * @param string $email
   * @access public
   */
  public function __construct($merchantCustomerId, $description, $email)
  {
    $this->merchantCustomerId = $merchantCustomerId;
    $this->description = $description;
    $this->email = $email;
  }

}
