<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetHostedProfilePageResponseType
{

  /**
   * 
   * @var string $token
   * @access public
   */
  public $token = null;

  /**
   * 
   * @param string $token
   * @access public
   */
  public function __construct($token)
  {
    $this->token = $token;
  }

}
