<?php


/**
 * 
 * @package apiClasses.apiObjects.setting
 */
class SettingType
{

  /**
   * 
   * @var string $settingName
   * @access public
   */
  public $settingName = null;

  /**
   * 
   * @var string $settingValue
   * @access public
   */
  public $settingValue = null;

  /**
   * 
   * @param string $settingName
   * @param string $settingValue
   * @access public
   */
  public function __construct($settingName, $settingValue)
  {
    $this->settingName = $settingName;
    $this->settingValue = $settingValue;
  }

}
