<?php


/**
 * 
 * @package apiClasses.apiObjects.extended
 */
class ExtendedAmountType
{

  /**
   * 
   * @var float $amount
   * @access public
   */
  public $amount = null;

  /**
   * 
   * @var string $name
   * @access public
   */
  public $name = null;

  /**
   * 
   * @var string $description
   * @access public
   */
  public $description = null;

  /**
   * 
   * @param float $amount
   * @param string $name
   * @param string $description
   * @access public
   */
  public function __construct($amount, $name, $description)
  {
    $this->amount = $amount;
    $this->name = $name;
    $this->description = $description;
  }

}
