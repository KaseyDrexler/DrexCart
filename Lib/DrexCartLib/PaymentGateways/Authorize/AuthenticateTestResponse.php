<?php


/**
 * 
 * @package apiClasses.apiObjects.authenticate
 */
class AuthenticateTestResponse
{

  /**
   * 
   * @var ANetApiResponseType $AuthenticateTestResult
   * @access public
   */
  public $AuthenticateTestResult = null;

  /**
   * 
   * @param ANetApiResponseType $AuthenticateTestResult
   * @access public
   */
  public function __construct($AuthenticateTestResult)
  {
    $this->AuthenticateTestResult = $AuthenticateTestResult;
  }

}
