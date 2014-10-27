<?php


/**
 * 
 * @package apiClasses.apiObjects.order
 */
class OrderType
{

  /**
   * 
   * @var string $invoiceNumber
   * @access public
   */
  public $invoiceNumber = null;

  /**
   * 
   * @var string $description
   * @access public
   */
  public $description = null;

  /**
   * 
   * @param string $invoiceNumber
   * @param string $description
   * @access public
   */
  public function __construct($invoiceNumber, $description)
  {
    $this->invoiceNumber = $invoiceNumber;
    $this->description = $description;
  }

}
