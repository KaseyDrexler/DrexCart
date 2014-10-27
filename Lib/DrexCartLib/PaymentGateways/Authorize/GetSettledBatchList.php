<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetSettledBatchList
{

  /**
   * 
   * @var MerchantAuthenticationType $merchantAuthentication
   * @access public
   */
  public $merchantAuthentication = null;

  /**
   * 
   * @var GetSettledBatchListRequestType $request
   * @access public
   */
  public $request = null;

  /**
   * 
   * @param MerchantAuthenticationType $merchantAuthentication
   * @param GetSettledBatchListRequestType $request
   * @access public
   */
  public function __construct($merchantAuthentication, $request)
  {
    $this->merchantAuthentication = $merchantAuthentication;
    $this->request = $request;
  }

}
