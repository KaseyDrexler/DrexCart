<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetUnsettledTransactionList
{

  /**
   * 
   * @var MerchantAuthenticationType $merchantAuthentication
   * @access public
   */
  public $merchantAuthentication = null;

  /**
   * 
   * @var GetUnsettledTransactionListRequestType $request
   * @access public
   */
  public $request = null;

  /**
   * 
   * @param MerchantAuthenticationType $merchantAuthentication
   * @param GetUnsettledTransactionListRequestType $request
   * @access public
   */
  public function __construct($merchantAuthentication, $request)
  {
    $this->merchantAuthentication = $merchantAuthentication;
    $this->request = $request;
  }

}
