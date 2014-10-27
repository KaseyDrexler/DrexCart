<?php


/**
 * 
 * @package apiClasses.apiObjects.is
 */
class IsAliveResponse
{

  /**
   * 
   * @var ANetApiResponseType $IsAliveResult
   * @access public
   */
  public $IsAliveResult = null;

  /**
   * 
   * @param ANetApiResponseType $IsAliveResult
   * @access public
   */
  public function __construct($IsAliveResult)
  {
    $this->IsAliveResult = $IsAliveResult;
  }

}
