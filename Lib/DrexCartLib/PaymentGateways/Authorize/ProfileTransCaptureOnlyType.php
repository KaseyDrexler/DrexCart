<?php


/**
 * 
 * @package apiClasses.apiObjects.profile
 */
class ProfileTransCaptureOnlyType
{

  /**
   * 
   * @var string $approvalCode
   * @access public
   */
  public $approvalCode = null;

  /**
   * 
   * @param string $approvalCode
   * @access public
   */
  public function __construct($approvalCode)
  {
    $this->approvalCode = $approvalCode;
  }

}
