<?php


/**
 * 
 * @package apiClasses.apiObjects.create
 */
class CreateCustomerProfileTransaction
{

  /**
   * 
   * @var MerchantAuthenticationType $merchantAuthentication
   * @access public
   */
  public $merchantAuthentication = null;

  /**
   * 
   * @var ProfileTransactionType $transaction
   * @access public
   */
  public $transaction = null;

  /**
   * 
   * @var string $extraOptions
   * @access public
   */
  public $extraOptions = null;

  /**
   * 
   * @param MerchantAuthenticationType $merchantAuthentication
   * @param ProfileTransactionType $transaction
   * @param string $extraOptions
   * @access public
   */
  public function __construct($merchantAuthentication, $transaction, $extraOptions)
  {
    $this->merchantAuthentication = $merchantAuthentication;
    $this->transaction = $transaction;
    $this->extraOptions = $extraOptions;
  }

}
