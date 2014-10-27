<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetHostedProfilePage
{

  /**
   * 
   * @var MerchantAuthenticationType $merchantAuthentication
   * @access public
   */
  public $merchantAuthentication = null;

  /**
   * 
   * @var int $customerProfileId
   * @access public
   */
  public $customerProfileId = null;

  /**
   * 
   * @var SettingType[] $hostedProfileSettings
   * @access public
   */
  public $hostedProfileSettings = null;

  /**
   * 
   * @param MerchantAuthenticationType $merchantAuthentication
   * @param int $customerProfileId
   * @param SettingType[] $hostedProfileSettings
   * @access public
   */
  public function __construct($merchantAuthentication, $customerProfileId, $hostedProfileSettings)
  {
    $this->merchantAuthentication = $merchantAuthentication;
    $this->customerProfileId = $customerProfileId;
    $this->hostedProfileSettings = $hostedProfileSettings;
  }

}
