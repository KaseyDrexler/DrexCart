<?php


/**
 * 
 * @package apiClasses.apiObjects.profile
 */
class ProfileTransactionType
{

  /**
   * 
   * @var ProfileTransVoidType $profileTransVoid
   * @access public
   */
  public $profileTransVoid = null;

  /**
   * 
   * @var ProfileTransAuthOnlyType $profileTransAuthOnly
   * @access public
   */
  public $profileTransAuthOnly = null;

  /**
   * 
   * @var ProfileTransCaptureOnlyType $profileTransCaptureOnly
   * @access public
   */
  public $profileTransCaptureOnly = null;

  /**
   * 
   * @var ProfileTransAuthCaptureType $profileTransAuthCapture
   * @access public
   */
  public $profileTransAuthCapture = null;

  /**
   * 
   * @var ProfileTransRefundType $profileTransRefund
   * @access public
   */
  public $profileTransRefund = null;

  /**
   * 
   * @var ProfileTransPriorAuthCaptureType $profileTransPriorAuthCapture
   * @access public
   */
  public $profileTransPriorAuthCapture = null;

  /**
   * 
   * @param ProfileTransVoidType $profileTransVoid
   * @param ProfileTransAuthOnlyType $profileTransAuthOnly
   * @param ProfileTransCaptureOnlyType $profileTransCaptureOnly
   * @param ProfileTransAuthCaptureType $profileTransAuthCapture
   * @param ProfileTransRefundType $profileTransRefund
   * @param ProfileTransPriorAuthCaptureType $profileTransPriorAuthCapture
   * @access public
   */
  public function __construct($profileTransVoid, $profileTransAuthOnly, $profileTransCaptureOnly, $profileTransAuthCapture, $profileTransRefund, $profileTransPriorAuthCapture)
  {
    $this->profileTransVoid = $profileTransVoid;
    $this->profileTransAuthOnly = $profileTransAuthOnly;
    $this->profileTransCaptureOnly = $profileTransCaptureOnly;
    $this->profileTransAuthCapture = $profileTransAuthCapture;
    $this->profileTransRefund = $profileTransRefund;
    $this->profileTransPriorAuthCapture = $profileTransPriorAuthCapture;
  }

}
