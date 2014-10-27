<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetHostedProfilePageResponse
{

  /**
   * 
   * @var GetHostedProfilePageResponseType $GetHostedProfilePageResult
   * @access public
   */
  public $GetHostedProfilePageResult = null;

  /**
   * 
   * @param GetHostedProfilePageResponseType $GetHostedProfilePageResult
   * @access public
   */
  public function __construct($GetHostedProfilePageResult)
  {
    $this->GetHostedProfilePageResult = $GetHostedProfilePageResult;
  }

}
