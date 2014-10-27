<?php


/**
 * 
 * @package apiClasses.apiObjects.drivers
 */
class DriversLicenseBaseType
{

  /**
   * 
   * @var string $state
   * @access public
   */
  public $state = null;

  /**
   * 
   * @param string $state
   * @access public
   */
  public function __construct($state)
  {
    $this->state = $state;
  }

}
