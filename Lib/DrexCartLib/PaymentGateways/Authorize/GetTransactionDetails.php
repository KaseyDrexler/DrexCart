<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetTransactionDetails
{

  /**
   * 
   * @var MerchantAuthenticationType $merchantAuthentication
   * @access public
   */
  public $merchantAuthentication = null;

  /**
   * 
   * @var string $transId
   * @access public
   */
  public $transId = null;

  /**
   * 
   * @param MerchantAuthenticationType $merchantAuthentication
   * @param string $transId
   * @access public
   */
  public function __construct($merchantAuthentication, $transId)
  {
    $this->merchantAuthentication = $merchantAuthentication;
    $this->transId = $transId;
  }

}
