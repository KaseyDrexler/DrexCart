<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetBatchStatistics
{

  /**
   * 
   * @var MerchantAuthenticationType $merchantAuthentication
   * @access public
   */
  public $merchantAuthentication = null;

  /**
   * 
   * @var GetBatchStatisticsRequestType $request
   * @access public
   */
  public $request = null;

  /**
   * 
   * @param MerchantAuthenticationType $merchantAuthentication
   * @param GetBatchStatisticsRequestType $request
   * @access public
   */
  public function __construct($merchantAuthentication, $request)
  {
    $this->merchantAuthentication = $merchantAuthentication;
    $this->request = $request;
  }

}
