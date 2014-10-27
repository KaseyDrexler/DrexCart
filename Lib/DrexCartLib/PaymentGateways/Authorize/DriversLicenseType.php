<?php


/**
 * 
 * @package apiClasses.apiObjects.drivers
 */
class DriversLicenseType
{

  /**
   * 
   * @var string $number
   * @access public
   */
  public $number = null;

  /**
   * 
   * @var string $dateOfBirth
   * @access public
   */
  public $dateOfBirth = null;

  /**
   * 
   * @param string $number
   * @param string $dateOfBirth
   * @access public
   */
  public function __construct($number, $dateOfBirth)
  {
    $this->number = $number;
    $this->dateOfBirth = $dateOfBirth;
  }

}
