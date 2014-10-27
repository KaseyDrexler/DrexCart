<?php


/**
 * 
 * @package apiClasses.apiObjects.name
 */
class NameAndAddressType
{

  /**
   * 
   * @var string $firstName
   * @access public
   */
  public $firstName = null;

  /**
   * 
   * @var string $lastName
   * @access public
   */
  public $lastName = null;

  /**
   * 
   * @var string $company
   * @access public
   */
  public $company = null;

  /**
   * 
   * @var string $address
   * @access public
   */
  public $address = null;

  /**
   * 
   * @var string $city
   * @access public
   */
  public $city = null;

  /**
   * 
   * @var string $state
   * @access public
   */
  public $state = null;

  /**
   * 
   * @var string $zip
   * @access public
   */
  public $zip = null;

  /**
   * 
   * @var string $country
   * @access public
   */
  public $country = null;

  /**
   * 
   * @param string $firstName
   * @param string $lastName
   * @param string $company
   * @param string $address
   * @param string $city
   * @param string $state
   * @param string $zip
   * @param string $country
   * @access public
   */
  public function __construct($firstName, $lastName, $company, $address, $city, $state, $zip, $country)
  {
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->company = $company;
    $this->address = $address;
    $this->city = $city;
    $this->state = $state;
    $this->zip = $zip;
    $this->country = $country;
  }

}
