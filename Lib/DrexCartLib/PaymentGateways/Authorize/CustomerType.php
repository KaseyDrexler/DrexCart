<?php


/**
 * 
 * @package apiClasses.apiObjects.customer
 */
class CustomerType
{

  /**
   * 
   * @var CustomerTypeEnum $type
   * @access public
   */
  public $type = null;

  /**
   * 
   * @var string $id
   * @access public
   */
  public $id = null;

  /**
   * 
   * @var string $email
   * @access public
   */
  public $email = null;

  /**
   * 
   * @var string $phoneNumber
   * @access public
   */
  public $phoneNumber = null;

  /**
   * 
   * @var string $faxNumber
   * @access public
   */
  public $faxNumber = null;

  /**
   * 
   * @var DriversLicenseType $driversLicense
   * @access public
   */
  public $driversLicense = null;

  /**
   * 
   * @var string $taxId
   * @access public
   */
  public $taxId = null;

  /**
   * 
   * @param CustomerTypeEnum $type
   * @param string $id
   * @param string $email
   * @param string $phoneNumber
   * @param string $faxNumber
   * @param DriversLicenseType $driversLicense
   * @param string $taxId
   * @access public
   */
  public function __construct($type, $id, $email, $phoneNumber, $faxNumber, $driversLicense, $taxId)
  {
    $this->type = $type;
    $this->id = $id;
    $this->email = $email;
    $this->phoneNumber = $phoneNumber;
    $this->faxNumber = $faxNumber;
    $this->driversLicense = $driversLicense;
    $this->taxId = $taxId;
  }

}
