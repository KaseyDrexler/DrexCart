<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetTransactionList
{

  /**
   * 
   * @var MerchantAuthenticationType $merchantAuthentication
   * @access public
   */
  public $merchantAuthentication = null;

  /**
   * 
   * @var GetTransactionListRequestType $request
   * @access public
   */
  public $request = null;

  /**
   * 
   * @param MerchantAuthenticationType $merchantAuthentication
   * @param GetTransactionListRequestType $request
   * @access public
   */
  public function __construct($merchantAuthentication, $request)
  {
    $this->merchantAuthentication = $merchantAuthentication;
    $this->request = $request;
  }

}
