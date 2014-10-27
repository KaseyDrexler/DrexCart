<?php


/**
 * 
 * @package apiClasses.apiObjects.update
 */
class UpdateSplitTenderGroup
{

  /**
   * 
   * @var MerchantAuthenticationType $merchantAuthentication
   * @access public
   */
  public $merchantAuthentication = null;

  /**
   * 
   * @var int $splitTenderId
   * @access public
   */
  public $splitTenderId = null;

  /**
   * 
   * @var SplitTenderStatusEnum $splitTenderStatus
   * @access public
   */
  public $splitTenderStatus = null;

  /**
   * 
   * @param MerchantAuthenticationType $merchantAuthentication
   * @param int $splitTenderId
   * @param SplitTenderStatusEnum $splitTenderStatus
   * @access public
   */
  public function __construct($merchantAuthentication, $splitTenderId, $splitTenderStatus)
  {
    $this->merchantAuthentication = $merchantAuthentication;
    $this->splitTenderId = $splitTenderId;
    $this->splitTenderStatus = $splitTenderStatus;
  }

}
