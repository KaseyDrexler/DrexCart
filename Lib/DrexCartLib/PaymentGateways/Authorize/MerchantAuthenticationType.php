<?php


/**
 * 
 * @package apiClasses.apiObjects.merchant
 */
class MerchantAuthenticationType
{

  /**
   * 
   * @var string $name
   * @access public
   */
  public $name = null;

  /**
   * 
   * @var string $transactionKey
   * @access public
   */
  public $transactionKey = null;

  /**
   * 
   * @param string $name
   * @param string $transactionKey
   * @access public
   */
  public function __construct($name, $transactionKey)
  {
    $this->name = $name;
    $this->transactionKey = $transactionKey;
  }

}
