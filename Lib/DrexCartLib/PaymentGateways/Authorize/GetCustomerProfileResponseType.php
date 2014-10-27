<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetCustomerProfileResponseType
{

  /**
   * 
   * @var CustomerProfileMaskedType $profile
   * @access public
   */
  public $profile = null;

  /**
   * 
   * @param CustomerProfileMaskedType $profile
   * @access public
   */
  public function __construct($profile)
  {
    $this->profile = $profile;
  }

}
